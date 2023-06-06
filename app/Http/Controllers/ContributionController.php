<?php

namespace App\Http\Controllers;

use App\Models\Capital;
use App\Models\NonCapital;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index(){
        // $capitals = Capital::where('profile_id', auth()->user()->profile->id)->get();
        // $noncapitals = NonCapital::where('profile_id', auth()->user()->profile->id)->get();
        return view('user.contribution.contribution');
    }
}
