<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorLocationUpdateRequest;
use App\Models\Businesszone;
use App\Models\Country;
use App\Models\District;
use App\Models\Profile;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Landtype;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class GeolocationController extends Controller
{
    public function index(){
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $countries = Country::all();
        $sectors = Sector::all();
        $landtypes = Landtype::all();
        // $regions = DB::table('regions')->get();
        $regions = Region::where('id', 13)->get();
        return view('user.geolocation.investorlocation', compact('profile','countries','sectors', 'regions', 'landtypes'));
    }

    public function update(InvestorLocationUpdateRequest $request)
    {
        $filterprofile = Profile::where('user_id', '=', auth()->id())->first();
        $otherlandid = null;

        if ($old_other = Landtype::find(3)) {
            if ($request->other_land_type) {
                $old_other->update(['name' => $request->other_land_type]);
                $otherlandid = $old_other->id;
            }
        } else {
            if ($request->other_land_type) {
                $otherland = Landtype::create(['name' => $request->other_land_type]);
                $otherlandid = $otherland->id;
            }
        }

        if ($request->file('cover')) {
            $path = Storage::disk('public')->put(('covers'), $request->file('cover'));
            if ($old = $filterprofile->cover) {
                Storage::disk('public')->delete($old);
            }
            $filterprofile->update(array_merge($request->validated(), [
                'cover' => $path,
                'landtype_id' => $otherlandid,
            ]));
        } else {
            $filterprofile->update(array_merge($request->validated(), ['landtype_id' => $otherlandid]));
        }

        return redirect()->route('geolocation')->with('message', 'Information is added successfully!');
    }

    public function district_businesszone($region_id){
        $districts = District::where('region_id', $region_id)->get();
        $businesszones = Businesszone::where('region_id', $region_id)->get();
        return Response::json(['district' => $districts, 'businesszone' => $businesszones]);
    }

    public function township($district_id){
        $townships = Township::where('district_id', $district_id)->get();
        return $townships;
    }
}
