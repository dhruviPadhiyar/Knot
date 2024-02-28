<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventPricing;
use App\Models\Host;
use App\Models\Price;
use App\Models\Status;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        $venue = Venue::all();
        $statuses = Status::all();
        return view('event.create', compact('categories', 'users', 'venue', 'statuses'));
    }

    public function store(StoreEventRequest $request)
    {
        $request->validated($request->all());

        $slug = Str::kebab($request->name);
        $event = new Event;

        $event->slug = $slug;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start;
        $event->end_date = $request->end;
        $event->host_id = $request->host;
        $event->venue_id = $request->venue;
        $event->status_id = $request->status;
        $event->category_id = $request->category;
        $event->price = $request->price;

        // storing the image
        $file = $request->file('thumbnail');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('Events'), $filename);

        $event->thumbnail = $filename;
        $event->save();


        $host = new Host;
        $host->user_id = $event->host_id;
        $host->event_id = $event->id;
        $host->save();

        toastr()->success('Event has been created successfully!');
        return redirect()->route('event.manage');
    }

    public function manage()
    {
        $events = Event::all();
        return view('event.manage', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('event.show', compact('event'));
    }
    public function edit($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $categories = Category::all();
        $statuses = Status::all();
        $hosts = User::all();
        $venues = Venue::all();
        return view('event.edit', compact('event', 'categories', 'hosts', 'statuses', 'venues'));
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $event = Event::where('slug', $slug)->firstOrFail();

        // Update event attributes if they are present in the request
        $event->name = $request->input('name', $event->name);
        $event->description = $request->input('description', $event->description);
        $event->start_date = $request->input('start', $event->start_date);
        $event->end_date = $request->input('end', $event->end_date);
        $event->host_id = $request->input('host', $event->host_id);
        $event->venue_id = $request->input('venue', $event->venue_id);
        $event->status_id = $request->input('status', $event->status_id);
        $event->category_id = $request->input('category', $event->category_id);
        $event->price =$request->input('price', $event->price);


        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Events'), $filename);
            $event->thumbnail = $filename;
        }

        // Save the event
        $event->save();

        toastr()->success('Event has been updated!');
        return redirect()->route('event.manage');
    }


    public function destroy($slug)
    {
        $eve = Event::where('slug', $slug)->first();
        $eve->delete();
        toastr()->success('Event deleted successfully!');
        return redirect()->route('event.manage');
    }
}
