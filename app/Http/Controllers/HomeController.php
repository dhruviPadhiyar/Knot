<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRequests;
use App\Models\Host;
use App\Models\Notification;
use App\Models\Ticket;
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
            $requests = EventRequests::all();
            $pending = EventRequests::where("status",'pending')->get();
            $apr = EventRequests::where('status','aprooved')->get();
            $notifications = Notification::where('receiverId', Auth::user()->id)->get();
            return view('admin.dashboard',compact('events','onGoing','upComing','users','hosts','requests','pending','apr','notifications'));
        }
        else{
            $events = Event::with('price')->orderBy('start_Date','asc')->get();
            $notifications = Notification::where('receiverId', Auth::user()->id)->get();
            return view('user.home',compact('events','notifications'));
        }

    }

    public function booking(){
        $user = Auth::user();
        $booking = Ticket::where('user_id',$user->id)->get();
        return view('user.bookings', compact('user','booking'));
    }

    public function requests(){
        $user=Auth::user();
        $hostedEvents = Event::where('host_id',$user->id)->get();
        return view('user.requests',compact('user','hostedEvents'));
    }

}
