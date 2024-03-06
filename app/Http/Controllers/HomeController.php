<?php

namespace App\Http\Controllers;

use App\Http\Middleware\MustBeAdmin;
use App\Models\Event;
use App\Models\EventRequests;
use App\Models\Host;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $user_name;
    protected $user_email;

    protected function setUserName($name)
    {
        $this->user_name = $name;
    }

    protected function setUserEmail($email)
    {
        $this->user_email = $email;
    }

    protected function getUserName()
    {
        return $this->user_name;
    }

    protected function getUserEmail()
    {
        return $this->user_email;
    }

    public function index()
    {
        // Log the access to the home page
        Log::channel('user_activity_log')->info('Home page');

        // Set user name and email if authenticated
        $this->setUserName(auth()->check() ? auth()->user()->name : '');
        $this->setUserEmail(auth()->check() ? auth()->user()->email : '');

        // Log user details
        $user = ['name' => $this->getUserName(), 'email' => $this->getUserEmail()];
        Log::channel('user_activity_log')->info('User details', $user);

        //  if user is a guest
        if (Auth::guest()) {
            // Returning the index view for guests
            return view('index');
        } else if (Auth::user()->email == "admin@test.com") {
            // If user is an admin
            $events = Event::all();
            $onGoing = Event::where("status_id", 2)->get();
            $upComing = Event::where("status_id", 1)->get();
            $users = User::all();
            $hosts = Host::all();
            $requests = EventRequests::all();
            $pending = EventRequests::where("status", 'pending')->get();
            $apr = EventRequests::where('status', 'aprooved')->get();
            $notifications = Notification::where('receiverId', Auth::user()->id)->get();
            // Return admin dashboard view
            return view('admin.dashboard', compact('events', 'onGoing', 'upComing', 'users', 'hosts', 'requests', 'pending', 'apr', 'notifications'));
        } else {
            // If user is not an admin
            $events = Event::with('price')->orderBy('start_Date', 'asc')->get();
            $notifications = Notification::where('receiverId', Auth::user()->id)->get();
            // Return user home view
            return view('user.home', compact('events', 'notifications'));
        }
    }
    public function booking()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get all bookings associated with the user
        $booking = Ticket::where('user_id', $user->id)->get();

        // Get notifications for the user
        $notifications = Notification::where('receiverId', $user->id)->get();

        // Return the bookings view with user, booking, and notifications data
        return view('user.bookings', compact('user', 'booking', 'notifications'));
    }

    public function requests()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get all events hosted by the user
        $hostedEvents = Event::where('host_id', $user->id)->get();

        // Get notifications for the user
        $notifications = Notification::where('receiverId', $user->id)->get();

        // Return the requests view with user, hostedEvents, and notifications data
        return view('user.requests', compact('user', 'hostedEvents', 'notifications'));
    }

}
