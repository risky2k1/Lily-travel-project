<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $tableName = Hotel::class;
        View::share('title', 'Booking');
    }

    public function index(Request $request)
    {
        $query = Booking::query();

        if ($request->input('state') && $request->input('state') !== 'all booking') {
            $query->where('state', $request->input('state'));
        }

        $bookings = $query->paginate();

        $bookingStates = Booking::getStates()->first()->toArray();

        return view('admin.layouts.booking.index', compact('bookings', 'bookingStates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
