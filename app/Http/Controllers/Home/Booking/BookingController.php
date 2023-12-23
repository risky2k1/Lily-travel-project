<?php

namespace App\Http\Controllers\Home\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\States\BookingState\Processing;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Hotel $hotel)
    {
        return view('home-layouts.booking.index', compact('hotel'));
    }

    public function store(Request $request, $type, $typeId)
    {
        switch ($type) {
            case('hotel'):
                $item = Hotel::findOrFail($typeId);
                break;
            case('tour'):
                break;
            default:
                return 0;
        }
        $booking = new Booking();
        $booking->state = Processing::class;
        $booking->start_date = $item->checkin_time;
        $booking->end_date = $item->checkout_time;
        $booking->total = $item->price;
        if (auth()->check()) {
            $booking->user_id = auth()->id();
        }
        $booking->user_name = $request->input('name');
        $booking->user_email = $request->input('email');
        $booking->user_phone = $request->input('phone');
        $booking->user_address = $request->input('address');
        $booking->user_request = $request->input('request');

        $booking->type()->associate($item);

        $booking->save();

        session()->flash('booking_success');

        return redirect()->route('home.page');
    }
}
