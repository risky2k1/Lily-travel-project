<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::where('is_feature', true)->get();
        $popularLocations = Location::where('is_feature', true)->get();

        return view('home-layouts.main-content', compact('hotels', 'popularLocations'));
    }
}
