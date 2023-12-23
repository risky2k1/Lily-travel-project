<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Dashboard');
//        $this->middleware(['role:manager','permission:publish articles|edit articles']);
    }

    public function index()
    {
        return view('admin.layouts.dashboard.index');
    }
}
