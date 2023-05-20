<?php

namespace App\Http\Controllers;

use App\Http\Requests\IconUpdateRequest;
use App\Models\Sector;
use Illuminate\Http\Request;
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
    public function update(IconUpdateRequest $request){
        $filtersector = Sector::find($request->sector_id);
        $path = Storage::disk('public')->put(('icons'), $request->file('icon'));
        if ($old = $filtersector->icon) {
            Storage::disk('public')->delete($old);
        }
        $filtersector->update(['icon'=>$path]);
        return back()->with('message', 'Icon is added successfully!');
    }
}
