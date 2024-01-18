<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\States\BookingState\Confirmed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::where('is_feature', true)->get();
        $popularLocations = Location::where('is_feature', true)->get();

        $locationsWithBookings = Location::take(3)->get();
        return view('home-layouts.main-content', compact('hotels', 'popularLocations','locationsWithBookings'));
    }

    public function addHotelToSession(Request $request)
    {
        $hotelId = $request->hotel_id;

        $selectedHotels = Session::get('selected_hotels', []);

        if (!in_array($hotelId, $selectedHotels)) {
            $selectedHotels[] = $hotelId;
            Session::put('selected_hotels', $selectedHotels);
            return response()->json(['message' => 'Hotel Id added to session']);
        }
        return response()->json(['message' => 'Hotel Id already exists in session']);
    }
}
