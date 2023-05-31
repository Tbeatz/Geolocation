<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Profile;
use App\Models\Sector;
use App\Models\Township;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $profiles = Profile::with('sector', 'townships', 'districts')->whereNotNull('geolocation')->get();
            return $profiles;
        }
        $sectors = Sector::all();
        $districts = District::where('region_id', 13)->get();
        return view('admin.map.map', compact('districts', 'sectors'));
    }

    public function township(Request $request){
        $townships = Township::whereIn('district_id', $request->district)->get();
        return $townships;
    }

    public function filtering(Request $request){
        return Profile::query()
        ->when($request->type, fn($query, $value) => $query->whereIn('type', $value))
        ->when($request->sector, fn($query, $value) => $query->whereIn('sector_id', $value))->with('sector')
        ->when($request->district, fn ($query, $value) => $query->whereIn('district_id', $value))
        ->when($request->township, fn ($query, $value) => $query->whereIn('township_id', $value))
        ->get();
    }
}
