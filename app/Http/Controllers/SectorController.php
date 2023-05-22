<?php

namespace App\Http\Controllers;

use App\Http\Requests\IconUpdateRequest;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $sectors = Sector::paginate(6);
            return view('sectortable',compact('sectors'))->render();
        }else{
            $sectors = Sector::paginate(6);
            return view('sector', compact('sectors'));
        }
    }
    public function fetch(){
        $sectors = Sector::all();
        return $sectors;
    }
    public function edit(Sector $sector){ //route model binding
        return $sector;
    }
    public function update(IconUpdateRequest $request, Sector $sector){
        $path = Storage::disk('public')->put(('icons'), $request->file('icon'));
        if ($old = $sector->icon) {
            Storage::disk('public')->delete($old);
        }
        $sector->update(['icon'=>$path]);
        return Response::json(['message'=>'Icon is added successfully!']);
    }
}
