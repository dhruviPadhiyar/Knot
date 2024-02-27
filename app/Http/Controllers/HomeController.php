<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Host;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::guest()){
            return view('index');
        }

        if(Auth::user()->email=="admin@test.com"){
            $events = Event::all();
            $onGoing = Event::where("status_id",2)->get();
            $upComing = Event::where("status_id",1)->get();
            $users = User::all();
            $hosts = Host::all();
            return view('admin.dashboard',compact('events','onGoing','upComing','users','hosts'));
        }
        else{
            $events = Event::all();
            return view('user.home',compact('events'));
        }


    }

    public function gmaps()
    {
    	// $locations = DB::table('locations')->get();
        $locations = "Ahmedabad";
    	return view('gmaps',compact('locations'));
    }

}
