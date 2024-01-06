<?php

namespace App\Http\Controllers\Home\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\States\BookingState\Processing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($type_id)
    {
        $type = HotelRoom::findOrFail($type_id);
        return view('home-layouts.booking.index', compact('type'));
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

        session()->flash('booking_success');

        return redirect()->route('home.page');
    }
}
