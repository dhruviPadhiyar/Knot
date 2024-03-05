<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EventRequests;
use App\Models\Notification;
use App\Models\User;
use App\Models\Venue;
use App\Services\EventRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRequestsController extends Controller
{
    protected $eventRequestService;
    public function __construct(EventRequestService $eventRequestService)
    {
        $this->eventRequestService = $eventRequestService;
    }
    public function create()
    {
        return $this->eventRequestService->create();
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
        return $this->eventRequestService->store($request);
    }

    public function manage()
    {
        return $this->eventRequestService->manage();
    }

    public function aproove($id)
    {
        return $this->eventRequestService->aproove($id);
    }

    public function reject($id)
    {
        return $this->eventRequestService->reject($id);
    }

}
