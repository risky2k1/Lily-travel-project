<?php

namespace App\Http\Controllers\Home\Booking;

use App\Http\Controllers\Controller;
use App\Mail\HotelBooked;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\States\BookingState\Confirmed;
use App\Models\States\BookingState\Processing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index(Request $request, Booking $booking)
    {
        if ($request->vnp_ResponseCode && $request->vnp_ResponseCode == 00) {
            toastr()->success('Thanh toán thành công');
        }
        return view('home-layouts.booking.index', compact('booking'));
    }

    public function create($type_id)
    {
        $type = HotelRoom::findOrFail($type_id);
        return view('home-layouts.booking.create', compact('type'));
    }

    public function store(Request $request, $type, $typeId)
    {
        switch ($type) {
            case('hotel'):
                $room = HotelRoom::findOrFail($typeId);
                $item = $room->hotel;
                break;
            case('tour'):
                break;
            default:
                return 0;
        }
        $booking = new Booking();
        $booking->state = Processing::class;
        $booking->start_date = $item->checkin_time ?? Carbon::now();
        $booking->end_date = $item->checkout_time ?? Carbon::now();
        $booking->total = $room->price ?? $item->price;
        if (auth()->check()) {
            $booking->user_id = auth()->id();
        }
        $booking->user_name = $request->input('name');
        $booking->user_email = $request->input('email');
        $booking->user_phone = $request->input('phone');
        $booking->user_address = $request->input('address');
        $booking->user_request = $request->input('request');

        $booking->modelType()->associate($item);

        $booking->save();
        Mail::to($request->input('email'))->send(new HotelBooked($booking));
        return redirect()->route('home.booking.index', $booking);
    }

    public function payment(Booking $booking)
    {

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://lily-travel.click/booking/".$booking->id;
        $vnp_TmnCode = "HAALBR4C";//Mã website tại VNPAY
        $vnp_HashSecret = "DOEDKVPCIDKPORUHIAKWOEBHJDDUMWWL"; //Chuỗi bí mật

        $vnp_TxnRef = $booking->id;
        $vnp_OrderInfo = "thanh toán hoá đơn";
        $vnp_OrderType = 'Thanh toán';
        $vnp_Amount = $booking->total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
//Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&'.urlencode($key)."=".urlencode($value);
            } else {
                $hashdata .= urlencode($key)."=".urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key)."=".urlencode($value).'&';
        }

        $vnp_Url = $vnp_Url."?".$query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            $booking->update([
                'state' => Confirmed::class,
            ]);
            header('Location: '.$vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
