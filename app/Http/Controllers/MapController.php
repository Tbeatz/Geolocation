<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $profiles = Profile::with('sector')->whereNotNull('geolocation')->get();
        return view('admin.map.map', compact('profiles'));
    }
}
