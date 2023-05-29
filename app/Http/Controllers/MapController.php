<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $profiles = Profile::with('sector')->whereNotNull('geolocation')->get();
            return $profiles;
        }
        return view('admin.map.map');
    }
}
