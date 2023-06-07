<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InvestorprofileController extends Controller
{
    public function index(){
        $users = User::where('is_admin', false)->where('active', true)->with('profile')->paginate(5);
        return view('admin.investorprofile.investorprofile', compact('users'));
    }

    public function paginate(Request $request)
    {
        $users = User::where('is_admin', false)->where('active', true)->with('profile')->paginate(5);
        return view('admin.investorprofile.investorprofile_table', compact('users'))->render();
    }
}
