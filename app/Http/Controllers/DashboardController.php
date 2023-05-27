<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardUpdateRequest;
use App\Models\FormOfInvest;
use App\Models\PermitType;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', '=', auth()->id())->first();
        $permit_types = PermitType::all();
        $form_of_invests = FormOfInvest::all();
        return view('user.dashboard.dashboard', compact('profile','permit_types','form_of_invests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DashboardUpdateRequest $request)
    {
        $profile = $request->user()->profile();

        $profile->update($request->validated());

        return redirect()->route('dashboard.update')->with('message', 'Company Information is added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
