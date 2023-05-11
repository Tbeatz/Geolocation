<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDataRequest;
use App\Models\Userdata;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    public function update(UpdateUserDataRequest $request)
    {
        $userdata = Userdata::all();
        $userdata->update($request->validated());
        return redirect(route('userdata.update'))->with('message', 'Data is added successfully!');
    }
}
