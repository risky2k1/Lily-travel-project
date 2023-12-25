<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\States\HotelState\Approved;
use Illuminate\Http\Request;

class AjaxHotelController extends Controller
{
    public function updateHotelState(Request $request)
    {
        $hotel = Hotel::findOrFail($request->hotel_id);

        if ($hotel->state->canTransitionTo(Approved::class)) {
            $hotel->state->transitionTo(Approved::class);
        }

        return response()->json([
            'status' => 'success',
        ]);
    }
}
