<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $popularLocations = Location::where('is_feature', true)->limit(10)->get();

        return view('home-layouts.main-content', compact('hotels', 'popularLocations'));
    }
}
