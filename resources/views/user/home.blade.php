<x-home.layout>
    <x-user.navbar />
    <div class="container mt-4">

        <div class="events m-2">
            <div class="eventCards">
                @foreach ($events as $event)
                    <div class="event-{{ $event->slug }} rounded border shadow bg-body-tertiary m-5">
                        <div class="row">

                            <div class="col-sm-6">
                                <img src="Events\{{ $event->thumbnail }}" class="img-fluid" alt="" />
                            </div>
                            <div class="col-sm-6">
                                <div class="details m-3 p-3">
                                    <div class="title m-2 mb-5">
                                        <h3 class="fw-bold text-center">
                                            {{ ucwords($event->name) }}
                                        </h3>
                                    </div>
                                    <div class="descriprion p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="description" class="fw-bold"><i
                                                        class="fa-solid fa-circle-info"></i></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <p>{{ $event->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dates m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="startDate" class="form-label"><i
                                                                class="fa-solid fa-circle-play"></i></label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <strong>
                                                            {{ date('d/m/Y', strtotime($event->start_Date)) }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="startDate" class="form-label"><i
                                                                class="fa-solid fa-circle-stop"></i></label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <strong>
                                                            {{ date('d/m/Y', strtotime($event->end_Date)) }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="venue m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fa-solid fa-location-dot"></i>&nbsp;

                                            </div>
                                            <div class="col-sm-10">
                                                <strong>{{ $event->venue->name }}</strong>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="status m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label"><i
                                                        class="fa-solid fa-chart-simple"></i></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <strong>{{ $event->status->name }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="status m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label"><i
                                                        class="fa-regular fa-money-bill-1"></i></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <strong>{{ $event->price }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bookBtn text-end">
                                        <form action="{{ route('event.ticket.book', $event->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-7">
                                                    <div class="">
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="quantity" id="quantity" placeholder="Enter Quantity" />
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        Book Slot
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
