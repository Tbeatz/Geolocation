<?php

use App\Http\Controllers\CapitalController;
use App\Http\Controllers\CompanydetailController;
use App\Http\Controllers\ContributionController;
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
    //Company Profile
    Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::patch('/dashboard',[DashboardController::class, 'update'])->name('dashboard.update');
        //director
    Route::get('/director-paginate',[DashboardController::class, 'director_paginate'])->name('directors.paginate');
    Route::post('/director-create',[DashboardController::class, 'director_create']);
    Route::get('/director/{director}',[DashboardController::class, 'director_edit']);
    Route::post('/director-update/{director}', [DashboardController::class, 'director_update']);
    Route::get('/fetch-directors',[DashboardController::class, 'director_fetch']);
    Route::delete('/director-delete/{director}',[DashboardController::class, 'director_destroy'])->name('director.destroy');
        //shareholder
    Route::get('/shareholder-paginate',[DashboardController::class, 'shareholder_paginate'])->name('shareholders.paginate');
    Route::post('/shareholder-create',[DashboardController::class, 'shareholder_create']);
    Route::get('/shareholder/{shareholder}',[DashboardController::class, 'shareholder_edit']);
    Route::post('/shareholder-update/{shareholder}', [DashboardController::class, 'shareholder_update']);
    Route::get('/fetch-shareholders',[DashboardController::class, 'shareholder_fetch']);
    Route::delete('/shareholder-delete/{shareholder}',[DashboardController::class, 'shareholder_destroy'])->name('shareholder.destroy');
    //geolocation
    Route::get('/geolocation',[GeolocationController::class, 'index'])->name('geolocation');
    Route::patch('/geolocation', [GeolocationController::class, 'update'])->name('geolocation.update');
    Route::get('/district_businesszone/{region_id}', [GeolocationController::class, 'district_businesszone']);
    Route::get('/township/{district_id}', [GeolocationController::class, 'township']);
    //Company Detail
    Route::get('/detail', [CompanydetailController::class, 'index'])->name('detail');
    Route::patch('/detail',[CompanydetailController::class, 'update'])->name('detail.update');
    //Capital
    Route::get('/contribution', [ContributionController::class, 'index'])->name('contribution');

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
    Route::get('/sectors/{sector}',[SectorController::class, 'edit'])->name('sector.edit');
    Route::post('/sectors/{sector}',[SectorController::class, 'update'])->name('sector.update');
    Route::get('/fetch-sectors',[SectorController::class, 'fetch'])->name('sector.fetch');
    Route::get('/sectors',[SectorController::class, 'index'])->name('sector');
    //Map
    Route::get('/map', [MapController::class, 'index'])->name('map');
    Route::get('/tsp', [MapController::class, 'township']);
    Route::get('/filter', [MapController::class, 'filtering']);
});

require __DIR__.'/auth.php';
