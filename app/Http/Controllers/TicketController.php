<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store($id, Request $request){
        $event = Event::find($id);
        $ticket = new Ticket;
        $ticket->event_id  =  $id;
        $ticket->user_id = auth()->user()->id;
        $ticket->price  = $event->price;
        $ticket->quantity = $request->quantity;

        $ticket->save();
        toastr()->success("Ticket booked successfully!");
        return redirect()->back();
    }
}
