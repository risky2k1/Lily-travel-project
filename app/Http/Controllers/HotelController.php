<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\States\HotelState\Pending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'author' => Auth::id(),
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
        return view('admin.layouts.hotel.edit', compact('hotel'));
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
        ]);
        $hotel->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'is_feature' => $request->input('is_feature'),
            'map' => $request->input('map'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
