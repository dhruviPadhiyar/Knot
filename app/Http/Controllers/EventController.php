<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // using dependency injection
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        // importing the service
        $this->eventService = $eventService;
    }

    public function create()
    {
        // calling create method from event service class.
        return $this->eventService->create();
    }

    public function store(StoreEventRequest $request)
    {
        // calling the store method
        return $this->eventService->store($request);
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
        // calling and returning the edit method
       return $this->eventService->edit($slug);
    }

    public function update(Request $request, $slug)
    {
        // calling and returning the update method.
        return $this->eventService->update($request, $slug);
    }


    public function destroy($slug)
    {
        // calling and returning the destroy method
       return $this->eventService->destroy($slug);
    }
}
