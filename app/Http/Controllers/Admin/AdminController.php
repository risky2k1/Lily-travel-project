<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\States\BookingState\Confirmed;
use App\Models\States\BookingState\Processing;
use App\Models\States\HotelState\Pending;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Dashboard');
    }

    public function index(Request $request)
    {
        $pendingHotels = Hotel::where('state', Pending::$name)->count();
        $pendingBookings = Booking::where('state', Processing::$name)->count();
        $bookingAmounts = Booking::all()->count();
        $totalAmounts = Booking::where('state', Confirmed::$name)->sum('total');
        $userAmounts = User::all()->count();

        $recentBookings = Booking::limit(5)->latest()->get();
        return view('admin.layouts.dashboard.index', compact('pendingHotels', 'pendingBookings', 'totalAmounts', 'bookingAmounts', 'userAmounts', 'recentBookings'));
    }
}
