<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['role:manager','permission:publish articles|edit articles']);
//    }

    public function index()
    {
        return view('admin.layouts.main');
    }
}
