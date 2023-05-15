<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorLocationUpdateRequest;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Sector;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    public function index(){
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $countries = Country::all();
        $sectors = Sector::all();
        return view('investorlocation', compact('profile','countries','sectors'));
    }

    public function update(InvestorLocationUpdateRequest $request){

        $profile = $request->user()->profile();

        $profile->update($request->validated());

        return redirect()->route('geolocation')->with('message', 'Information is added successfully!');
    }
}
