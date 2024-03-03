<x-home.layout>
    <x-admin.navbar :notifications="$notifications"  />

    <div class="container">
        <div class="main">
            <div class="showEvent shadow bg-body-tertiary mt-5 p-5 rounded">
                <a href="{{ url()->previous() }}" class="btn"> < Go back</a>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="eventThumbnail mt-5">
                        <img src="{{ url('Events/' . $event->thumbnail) }}" class="img-fluid rounded" alt="" />

                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="eventTitle text-center">
                            <h3 class="text-danger fw-bold">{{ $event->name }}</h3>
                        </div>
                        <table class="table table-striped table-responsive text-center m-3">
                            <tr>
                                <th>Title</th>
                                <td>{{ $event->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <p>{{ $event->description }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $event->category->title }}</td>
                            </tr>
                            <tr>
                                <th>Host</th>
                                <td>{{ $event->host->name }}</td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td>{{ date_format(date_create($event->start_date), 'F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td>{{ date_format(date_create($event->end_date), 'F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Venue</th>
                                <td>
                                    <a href="{{ route('mapview', $event->venue->id) }}" class="text-dark"
                                        style="text-decoration: none;">{{ $event->venue->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $event->status->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-home.layout>
