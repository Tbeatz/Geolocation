<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Profile;
use App\Models\Sector;
use App\Models\Township;
use App\Models\FormOfInvest;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $profiles = Profile::with('sector', 'townships', 'districts', 'country', 'region', 'landtype', 'businesszone', 'commercial_country', 'currency', 'permit_type', 'form_of_invest')->whereNotNull('geolocation')->get();
            return $profiles;
        }
        $sectors = Sector::all();
        $districts = District::where('region_id', 13)->get();
        $formOfInvests = FormOfInvest::whereIn('id', [1,2,4])->get();
        return view('admin.map.map', compact('districts', 'sectors', 'formOfInvests'));
    }

    public function township(Request $request){
        $townships = Township::whereIn('district_id', $request->district)->get();
        return $townships;
    }

    public function filtering(Request $request){
        return Profile::query()
        ->when($request->formOfInvest, fn($query, $value) => $query->whereIn('form_of_invest_id', $value))
        ->when($request->sector, fn($query, $value) => $query->whereIn('sector_id', $value))
        ->when($request->district, fn ($query, $value) => $query->whereIn('district_id', $value))
        ->when($request->township, fn ($query, $value) => $query->whereIn('township_id', $value))->with('permit_type', 'form_of_invest', 'country','region', 'districts', 'townships', 'businesszone', 'landtype', 'sector')
        ->get();
    }
}
