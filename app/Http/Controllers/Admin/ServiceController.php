<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\HotelRoomOption;
use App\Models\Service;
use App\Models\States\HotelState\Pending;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $tableName = Service::class;
        View::share('title', 'Services');
    }

    public function index(Request $request)
    {
        $services = Service::paginate();
        return view('admin.layouts.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
        ]);
        $service = Service::create([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Tạo thành công');
        return redirect()->route('admin.service.index', $service);
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
    public function edit(Service $service)
    {
        return view('admin.layouts.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => ['string', 'required'],
        ]);

        $service->update([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Cập nhật thành công');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->hotels->count() == 0) {
            $service->delete();
            toastr()->success('Xoá dịch vụ thành công');
        } else {
            toastr()->error('Có khách sạn với dịch vụ này');
        }
        return redirect()->route('admin.service.index');
    }
}
