<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardUpdateRequest;
use App\Http\Requests\DirectorUpdateRequest;
use App\Http\Requests\ShareholderUpdateRequest;
use App\Models\Director;
use App\Models\FormOfInvest;
use App\Models\Nationality;
use App\Models\PermitType;
use App\Models\Profile;
use App\Models\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laravel\Sanctum\Sanctum;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $permit_types = PermitType::whereIn('id', [1,2,16])->get();
        $form_of_invests = FormOfInvest::whereIn('id', [1,2,4])->get();
        $directors = Director::with('nationality')->where('profile_id', auth()->user()->profile->id)->paginate(5);
        $shareholders = Shareholder::with('nationality')->where('profile_id', auth()->user()->profile->id)->paginate(5);
        $nationalities = Nationality::all();
        return view('user.dashboard.dashboard', compact('profile','permit_types','form_of_invests','directors', 'shareholders', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DashboardUpdateRequest $request)
    {
        $profile = $request->user()->profile();

        $profile->update(array_merge($request->validated(), [ //need to use arrray_merge cuz update only accept one param with array.
            'commercial_date' => $request->commercial_date,
        ]));

        return redirect()->route('dashboard.update')->with('message', 'Company Information is added successfully!');
    }
    //director
    public function director_fetch(){
        $directors = Director::with('nationality')->paginate(5);
        return view('user.dashboard.director_table', compact('directors'))->render();
    }

    public function director_edit(Director $director){
        return $director;
    }

    public function director_update(DirectorUpdateRequest $request, Director $director)
    {
        $director->update($request->validated());

        return Response::json(['message'=>'Director is updated successfully!', 'director'=>$director]);
    }

    public function director_destroy(Director $director)
    {
        $director->delete();
        return response()->json(['message' => 'Director is deleted Successfully!']);
    }

    public function director_paginate(Request $request){
        $directors = Director::with('nationality')->paginate(5);
        return view('user.dashboard.director_table', compact('directors'))->render();
    }

    public function director_create(DirectorUpdateRequest $request){
        $validatedData = $request->validated();
        $director = Director::firstOrCreate($validatedData,[
            'profile_id' => $request->user()->profile->id,
            ]
        );
        return response()->json(['message' => 'Director is added successfully!', 'director' => $director]);
    }

    //shareholder
    public function shareholder_fetch(){
        $shareholders = Shareholder::with('nationality')->paginate(5);
        return view('user.dashboard.shareholder_table', compact('shareholders'))->render();
    }

    public function shareholder_edit(Shareholder $shareholder){
        return $shareholder;
    }

    public function shareholder_update(ShareholderUpdateRequest $request, Shareholder $shareholder)
    {
        $shareholder->update($request->validated());

        return Response::json(['message'=>'Shareholder is updated successfully!', 'shareholder'=>$shareholder]);
    }

    public function shareholder_destroy(Shareholder $shareholder)
    {
        $shareholder->delete();
        return response()->json(['message'=>'Shareholder is deleted successfully!']);
    }

    public function shareholder_paginate(Request $request){
        $shareholders = Shareholder::with('nationality')->paginate(5);
        return view('user.dashboard.shareholder_table', compact('shareholders'))->render();
    }

    public function shareholder_create(ShareholderUpdateRequest $request){
        $validatedData = $request->validated();
        $shareholder = Shareholder::firstOrCreate($validatedData,[
            'profile_id' => $request->user()->profile->id,
            ]
        );
        return response()->json(['message' => 'Shareholder is added successfully!', 'shareholder' => $shareholder]);
    }
}
