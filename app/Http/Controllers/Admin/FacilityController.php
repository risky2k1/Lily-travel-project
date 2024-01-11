<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $tableName = Service::class;
        View::share('title', 'Facilities');
    }

    public function index()
    {
        $facilities = Facility::paginate();
        return view('admin.layouts.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
        ]);
        $facility = Facility::create([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Tạo thành công');
        return redirect()->route('admin.facility.index', $facility);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('admin.layouts.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => ['string', 'required'],
        ]);

        $facility->update([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Cập nhật thành công');
        return redirect()->route('admin.facility.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        if ($facility->hotels->count() == 0) {
            $facility->delete();
            toastr()->success('Xoá dịch vụ thành công');
        } else {
            toastr()->error('Có khách sạn với dịch vụ này');
        }
        return redirect()->route('admin.facility.index');
    }
}
