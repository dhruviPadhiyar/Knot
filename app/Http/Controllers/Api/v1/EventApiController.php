<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Host;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class EventApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy("created_at", "desc")->paginate(10);
        return response()->json($events, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::kebab($request->name);
        $event = new Event;

        // Update event attributes
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

        // Store the image
        $file = $request->file('thumbnail');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('Events'), $filename);
        $event->thumbnail = $filename;

        // Save the event
        $event->save();

        // Create host entry
        $host = new Host;
        $host->user_id = $event->host_id;
        $host->event_id = $event->id;
        $host->save();

        return response()->json(['message' => 'Event created successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get the requested event
        $event = Event::find($id);
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'sometimes|required|date',
            'end' => 'sometimes|required|date',
            'host' => 'sometimes|required|exists:hosts,id',
            'venue' => 'sometimes|required|exists:venues,id',
            'status' => 'sometimes|required|exists:statuses,id',
            'category' => 'sometimes|required|exists:categories,id',
            'price' => 'nullable|numeric',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        // Update the thumbnail if provided
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Events'), $filename);
            $event->thumbnail = $filename;
        }

        // Save the updated event
        $event->save();

        return response()->json(['message' => 'Event updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json('success', 'Event has been deleted!');
    }
}
