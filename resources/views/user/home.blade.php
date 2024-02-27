<x-home.layout>
    <x-user.navbar />
    <div class="container mt-4">

        <div class="events">
            <div class="eventCards">
                @foreach ($events as $event)
                    <div class="event{{ $event->id }}">
                        <div class="row m-4 p-4 shadow border">
                            <div class="title m-2">
                                <h3 class="fw-bold text-center">
                                    {{ ucwords($event->name) }}
                                </h3>
                            </div>
                            <div class="col-5">
                                <img src="Events\{{ $event->thumbnail }}" class="img-thumbnail" />
                            </div>
                            <div class="col-7 mt-3">

                                <div class="descriprion border p-1">
                                    <label for="description" class="fw-bold">What the event is about?</label>
                                    <p>{{ $event->description }}</p>
                                </div>

                                <div class="dates m-1 p-1 border">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="startDate" class="form-label">Start Date</label>
                                            <strong>
                                                {{ date('d/m/Y', strtotime($event->start_Date)) }}
                                            </strong>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="startDate" class="form-label">End Date</label>
                                            <strong>
                                                {{ date('d/m/Y', strtotime($event->end_Date)) }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="venue m-1 p-1">
                                    <i class="fa-solid fa-location-dot"></i>&nbsp;
                                    {{ $event->venue->name }}
                                </div>

                                <div class="status m-1 p-1">
                                    <label for="" class="form-label">Status</label>
                                    <strong>{{ $event->status->name }}</strong>
                                </div>
                                <div class="bookBtn text-end">
                                    <a href="" class="btn btn-sm btn-outline-danger">
                                        Book your seat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-home.layout>
