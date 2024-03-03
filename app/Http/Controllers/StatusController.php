<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function create(){
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view("status.create",compact("notifications"));
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
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view("status.manage",compact("statuses","notifications"));
    }

}
