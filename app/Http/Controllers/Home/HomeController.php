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
        $query = Hotel::query();
        if (!empty($request->input('location'))) {
            $location = Location::where('id', $request->input('location'))->first();

            if ($location) {
                $query->where('location_id', $location->id);
            }
        }
        if (!empty($request->input('check_in'))) {
            $query->where('checkin_time', '>=', $request->input('check_in'));
        }
        if (!empty($request->input('check_out'))) {
            $query->where('checkout_time', '<=', $request->input('check_out'));
        }
        if (!empty($request->input('adults'))) {
            $query->where('max_guests', '>=', $request->input('adults'));
        }
        $hotels = $query->get();
        $popularLocations = Location::where('is_feature', true)->limit(10)->get();

        return view('home-layouts.main-content', compact('hotels', 'popularLocations'));
    }
}
