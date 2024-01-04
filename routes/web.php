<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjaxHotelController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HotelController;
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
    Route::get('/{type_id}', [HomeBookingController::class, 'index'])->name('home.booking.index');
    Route::post('/{type}/{type_id}', [HomeBookingController::class, 'store'])->name('home.booking.store');
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

    });

    Route::prefix('booking')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('admin.booking.index');
//        Route::get('/create', [HotelController::class, 'create'])->name('admin.hotel.create');
//        Route::post('/', [HotelController::class, 'store'])->name('admin.hotel.store');
//        Route::get('/{hotel}', [HotelController::class, 'edit'])->name('admin.hotel.edit');
//        Route::patch('/{hotel}', [HotelController::class, 'update'])->name('admin.hotel.update');

    });

//    Route::prefix('/user')->group(function (){
//       Route::get('/',[])
//    });

    Route::prefix('ajax')->group(function () {
        Route::post('/change-hotel-state', [AjaxHotelController::class, 'updateHotelState'])->name('ajax-hotel.state-hotel-update');
    });
});


Route::get('/test', function () {
    return view('home-auth.login');
});

require __DIR__.'/auth.php';
