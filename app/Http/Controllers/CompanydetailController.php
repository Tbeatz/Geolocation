<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailUpdateRequest;
use App\Models\AppointedLabour;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Profile;
use Illuminate\Http\Request;

class CompanydetailController extends Controller
{
    public function index()
    {
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $currencies = Currency::all();
        $countries = Country::all();
        return view('user.detail.detail', compact('profile', 'currencies', 'countries'));
    }

    public function update(DetailUpdateRequest $request)
    {
        $profile = $request->user()->profile();
        $profile->update($request->validated());
        return back()->with('message', 'Company Details are added successfully!');
    }
}
