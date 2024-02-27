<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\Host;
use Illuminate\Http\Request;
use Str;

class EventPricingController extends Controller
{
    public function storeEvent(StoreEventRequest $request){
        // dd($request->all());
        $request->validated($request->all());
        // dd($request->all());

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

        // storing the image
        $file= $request->file('thumbnail');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('Events'), $filename);

        $event->thumbnail = $filename;
        $event->save();
        // storing the host
        $host = new Host;
        $host->user_id = $event->host_id;
        $host->event_id = $event->id;
        $host->save();

        $id = $event->id;
        toastr()->success('Event has been created successfully!');
        dd("ok");
        // return view("event.createPricing",compact("id"));
        // return redirect()->route('event.pricing.create');
    }

    public function create($id){
        $event = Event::find($id);
        dd("ok");
    }
}
