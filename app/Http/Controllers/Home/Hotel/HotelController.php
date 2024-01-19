<?php

namespace App\Http\Controllers\Home\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        if (!empty($request->input('name'))) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if (!empty($request->input('location'))) {
            $query->where('location_id', $request->input('location'));
        }
        if (!empty($request->input('check_in'))) {
            $query->where('checkin_time', '<=', $request->input('check_in'));
        }
        if (!empty($request->input('check_out'))) {
            $query->where('checkout_time', '>=', $request->input('check_out'));
        }
        if (!empty($request->input('guests'))) {
            $query->where('max_guests', '>=', $request->input('guests'));
        }
        if (!empty($request->input('range'))) {
            $query->where('price', '<=', $request->input('range'));
        }
        $hotels = $query->latest()->paginate()->withQueryString();

        $types = Type::all();
        $services = Service::all();
        $facilities = Facility::all();

        return view('home-layouts.hotel.list', compact('hotels', 'types', 'services', 'facilities'));
    }

    public function show(Hotel $hotel)
    {
        return view('home-layouts.hotel.show', compact('hotel'));
    }
}
