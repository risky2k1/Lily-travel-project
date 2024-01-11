<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjaxHotelController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\Booking\BookingController as HomeBookingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\Hotel\HotelController as HomeHotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.page');

Route::prefix('hotel')->group(function () {
    Route::get('/', [HomeHotelController::class, 'index'])->name('home.hotel.index');
    Route::get('/{hotel}', [HomeHotelController::class, 'show'])->name('home.hotel.show');
});
Route::prefix('booking')->group(function () {
    Route::get('/{booking}', [HomeBookingController::class, 'index'])->name('home.booking.index');
    Route::get('/create/{type_id}', [HomeBookingController::class, 'create'])->name('home.booking.create');
    Route::post('/{type}/{type_id}', [HomeBookingController::class, 'store'])->name('home.booking.store');
    Route::post('/{booking}', [HomeBookingController::class, 'payment'])->name('home.booking.payment');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::prefix('hotel')->group(function () {
        Route::get('/', [HotelController::class, 'index'])->name('admin.hotel.index');
        Route::get('/create', [HotelController::class, 'create'])->name('admin.hotel.create');
        Route::post('/', [HotelController::class, 'store'])->name('admin.hotel.store');
        Route::get('/{hotel}', [HotelController::class, 'edit'])->name('admin.hotel.edit');
        Route::patch('/{hotel}', [HotelController::class, 'update'])->name('admin.hotel.update');
        Route::delete('/{hotel}', [HotelController::class, 'destroy'])->name('admin.hotel.destroy');
    });

    Route::prefix('booking')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('admin.booking.index');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });

    Route::prefix('service')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/{service}', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::patch('/{service}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
    });

    Route::prefix('facility')->group(function () {
        Route::get('/', [FacilityController::class, 'index'])->name('admin.facility.index');
        Route::get('/create', [FacilityController::class, 'create'])->name('admin.facility.create');
        Route::post('/', [FacilityController::class, 'store'])->name('admin.facility.store');
        Route::get('/{facility}', [FacilityController::class, 'edit'])->name('admin.facility.edit');
        Route::patch('/{facility}', [FacilityController::class, 'update'])->name('admin.facility.update');
        Route::delete('/{facility}', [FacilityController::class, 'destroy'])->name('admin.facility.destroy');
    });

    Route::prefix('ajax')->group(function () {
        Route::post('/change-hotel-state', [AjaxHotelController::class, 'updateHotelState'])->name('ajax-hotel.state-hotel-update');
    });
});


Route::get('/test', function () {
    return view('home-auth.login');
});

require __DIR__.'/auth.php';
