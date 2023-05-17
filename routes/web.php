<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SectorController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'user'])->group(function () {
     //Investor
     Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
     Route::patch('/dashboard',[DashboardController::class, 'update'])->name('dashboard.update');
     Route::get('/geolocation',[GeolocationController::class, 'index'])->name('geolocation');
     Route::patch('/geolocation', [GeolocationController::class, 'update'])->name('geolocation.update');
});

//Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar',[AvatarController::class, 'update'])->name('profile.avatar');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin
    Route::get('/users',[UserController::class, 'index'])->name('users');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.approve');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.reject');
    Route::get('users-paginate',[UserController::class, 'paginate'])->name('users.paginate');
    Route::resource('userdata', UserdataController::class)->parameters(['userdata' => "userdata"]);
    Route::get('/sectors',[SectorController::class, 'index'])->name('sector');
    Route::patch('/sectors/icon',[SectorController::class, 'update'])->name('sector.update');
    //Map
    Route::get('/map', [MapController::class, 'index'])->name('map');
});

require __DIR__.'/auth.php';
