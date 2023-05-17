<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorLocationUpdateRequest;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeolocationController extends Controller
{
    public function index(){
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $countries = Country::all();
        $sectors = Sector::all();
        return view('investorlocation', compact('profile','countries','sectors'));
    }

    public function update(InvestorLocationUpdateRequest $request)
    {
        $filterprofile = Profile::where('user_id', '=', auth()->id())->first();
        $path = Storage::disk('public')->put(('covers'), $request->file('cover'));
        if ($old = $filterprofile->cover) {
            Storage::disk('public')->delete($old);
        }
        $filterprofile->update(array_merge($request->validated(), ['cover' => $path]));

        return redirect()->route('geolocation')->with('message', 'Information is added successfully!');
    }
}
