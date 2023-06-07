<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
    $users = User::where('active', true)->where('is_admin', false)->with('profile')->get();
        return view('admin.admindashboard.admindashboard', compact('users'));
    }
}
