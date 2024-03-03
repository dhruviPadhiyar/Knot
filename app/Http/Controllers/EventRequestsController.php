<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EventRequests;
use App\Models\Notification;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRequestsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $venues = Venue::all();

        return view("user.createRequest", compact('categories', 'venues'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'start' => 'required',
            'end' => 'required',
            'thumbnail' => 'required',
            'price' => 'sometimes',
            'description' => 'required',
            'venue' => 'required'
        ]);

        $req = new EventRequests;

        $req->title = $request->title;
        $req->description = $request->description;
        $req->startDate = $request->start;
        $req->endDate = $request->end;
        $req->category_id = $request->category;
        $req->venue_id = $request->venue;
        $req->price = $request->price;
        $req->status = "pending";
        $req->user_id = auth()->user()->id;

        // Store the image
        $file = $request->file('thumbnail');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('Events'), $filename);
        $req->thumbnail = $filename;

        $req->save();

        // Find admin user
        $admin = User::where('is_admin', 1)->first();

        $notification = new Notification;
        $notification->senderId = auth()->user()->id;
        $notification->receiverId = $admin->id;
        $notification->subject = "Request";
        $notification->body = "New event request from ".auth()->user()->name;
        $notification->save();

        toastr()->success('Request has been made succesfully!');
        return redirect()->route('index');
    }

    public function manage()
    {
        $requests = EventRequests::all();
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view('admin.manageRequest', compact('requests','notifications'));
    }

    public function aproove($id)
    {
        $eve = EventRequests::find($id);
        $eve->status = "aprooved";
        $eve->save();

        $notification = new Notification;
        $notification->senderId = auth()->user()->id;
        $notification->receiverId = $eve->user_id;
        $notification->subject = "Aprooved!";
        $notification->body = "Your event request for '".$eve->title."' has been approved by Admin.";
        $notification->save();

        toastr()->success("Event has been approved!");
        return redirect()->route("requests.manage");
    }

    public function reject($id)
    {
        $eve = EventRequests::find($id);
        $eve->status = "rejected";
        $eve->save();

        toastr()->error("Event has been rejected!");
        return redirect()->route("requests.manage");
    }

}
