<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Service;
use App\Models\States\HotelState\Pending;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $tableName = Hotel::class;
        View::share('title', 'Hotel');
    }

    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->input('state') && $request->input('state') !== 'all hotel') {
            $query->where('state', $request->input('state'));
        }

        $hotels = $query->paginate();

        $hotelStates = Hotel::getStates()->first()->toArray();
        return view('admin.layouts.hotel.index', compact('hotels', 'hotelStates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'content' => ['string', 'required'],
            'is_feature' => ['nullable'],
        ]);
        $hotel = Hotel::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'is_feature' => $request->input('is_feature'),
            'author_id' => Auth::id(),
            'state' => Pending::class,
        ]);

        return redirect()->route('admin.hotel.edit', $hotel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $types = Type::all();
        $services = Service::all();
        $facilities = Facility::all();

        $selectedTypes = $hotel->types->pluck('id')->toArray();
        $selectedServices = $hotel->services->pluck('id')->toArray();
        $selectedFacilities = $hotel->facilities->pluck('id')->toArray();

        return view('admin.layouts.hotel.edit', compact('hotel', 'types', 'services', 'facilities', 'selectedTypes', 'selectedServices', 'selectedFacilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'content' => ['string', 'required'],
            'is_feature' => ['nullable'],
            'map' => ['nullable'],
            'address' => ['nullable'],
            'price' => ['string', 'nullable'],
            'checkin' => ['date', 'nullable'],
            'checkout' => ['date', 'nullable'],
        ]);

        if (!empty($request->input('type'))) {
            $hotel->types()->sync($request->input('type'));
        }
        if (!empty($request->input('facility'))) {
            $hotel->facilities()->sync($request->input('facility'));
        }
        if (!empty($request->input('service'))) {
            $hotel->services()->sync($request->input('service'));
        }
        if ($request->file('images')){
            foreach ($request->file('images') as $item){
                $hotel->addMedia($item)->toMediaCollection('hotel-images');
            }
        }

        $hotel->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'is_feature' => $request->input('is_feature'),
            'map' => $request->input('map'),
            'address' => $request->input('address'),
            'price' => $request->input('price'),
            'checkin_time' => $request->input('checkin'),
            'checkout_time' => $request->input('checkout'),
        ]);

        return redirect()->route('admin.hotel.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
