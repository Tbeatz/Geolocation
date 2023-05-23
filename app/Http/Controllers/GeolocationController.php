<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorLocationUpdateRequest;
use App\Models\Country;
use App\Models\District;
use App\Models\Profile;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GeolocationController extends Controller
{
    public function index(){
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $countries = Country::all();
        $sectors = Sector::all();
        // $regions = DB::table('regions')->get();
        $regions = Region::all();
        $districts = District::all();
        $townships = Township::all();
        return view('investorlocation', compact('profile','countries','sectors', 'regions', 'districts', 'townships'));
    }

    public function update(InvestorLocationUpdateRequest $request)
    {
        if ($request->file('cover')) {
            $filterprofile = Profile::where('user_id', '=', auth()->id())->first();
            $path = Storage::disk('public')->put(('covers'), $request->file('cover'));
            if ($old = $filterprofile->cover) {
                Storage::disk('public')->delete($old);
            }
            $filterprofile->update(array_merge($request->validated(), ['cover' => $path]));
        }else{
            $filterprofile = Profile::where('user_id', '=', auth()->id())->first();
            $filterprofile->update($request->validated());
        }
        return redirect()->route('geolocation')->with('message', 'Information is added successfully!');
    }
}
