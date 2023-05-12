<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserdataController;
use App\Models\FormOfInvest;
use App\Models\PermitType;
use App\Models\Profile;
use App\Models\User;
use App\Models\Userdata;
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
//Users
Route::get('/users', function(){
    $users = User::where('is_admin', false)->where('active',false)->with('profile')->get();
    return view('users', compact('users'));
})->name('users');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.approve');
Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.reject');

//Map
Route::get('/map', function(){
    return view('map');
})->name('map');

//UserData
Route::resource('userdata', UserdataController::class)->parameters(['userdata' => "userdata"]);

//Dashboard
Route::get('/dashboard', function () {
    $profile = Profile::where('user_id', '=', auth()->id())->first();
    $permit_types = PermitType::all();
    $form_of_invests = FormOfInvest::all();
    return view('dashboard', compact('profile','permit_types','form_of_invests'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::patch('/dashboard',[DashboardController::class, 'update'])->name('dashboard.update');

//Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar',[AvatarController::class, 'update'])->name('profile.avatar');
});

require __DIR__.'/auth.php';
