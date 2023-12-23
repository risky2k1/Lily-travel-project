<?php

namespace App\Http\Controllers\Home\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{
//    public function index()
//    {
//        return view();
//    }
    public function show(Hotel $hotel)
    {
        return view('home-layouts.hotel.show', compact('hotel'));
    }
}
