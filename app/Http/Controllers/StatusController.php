<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function create(){
        return view("status.create");
    }
    public function store(Request $request){
        $status = new Status();
        $status->name = $request->name;
        $status->description = $request->description;
        $status->save();
        toastr()->success("Status created successfully!");
        // return redirect()->route('status.manage');
        return back();
    }

    public function manage(){
        $statuses = Status::all();
        return view("status.manage",compact("statuses"));
    }

}
