<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserdataRequest;
use App\Models\Country;
use App\Models\FormOfInvest;
use App\Models\PermitType;
use App\Models\Sector;
use App\Models\Userdata;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->searchInput;
        if($request->ajax()){
            $userdatas = Userdata::paginate(5);
            return view('paginationdata',compact('userdatas'))->render();
        }else{
            $userdatas = Userdata::paginate(5);
            return view('userdata', compact('userdatas'));
        }
        // $userdatas = Userdata::orwhere('investor_name', 'LIKE', '%'.$search.'%')
        //     ->orwhere('company_name', 'LIKE', '%'.$search.'%')
        //     ->orwhere('company_reg_no', 'LIKE', '%'.$search.'%')
        //     ->orwhere('permit_no', 'LIKE', '%'.$search.'%')->get();
    }
    public function paginate(Request $request){
        $userdatas = Userdata::paginate(5);
        return view('paginationdata',compact('userdatas'))->render();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $sectors = Sector::all();
        return view('userdataform', compact('countries', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateUserdataRequest $request)
    {
        Userdata::create($request->validated());

        return redirect()->route('userdata.index')->with('message', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Userdata $userdata)
    {
        return view('userdataform_show', compact('userdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userdata $userdata)
    {
        return view('userdataform_edit', [
            'userdata' => $userdata,
            'countries' =>  Country::all(),
            'sectors' =>  Sector::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserdataRequest $request, Userdata $userdata)
    {
        $userdata->update($request->validated());

        return redirect()->route('userdata.index')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userdata $userdata)
    {
        $userdata->delete();

        return redirect()->route('userdata.index')->with('message', 'Data deleted successfully');
    }
}
