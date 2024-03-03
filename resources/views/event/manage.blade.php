<x-home.layout>
    <x-admin.navbar :notifications="$notifications"  />

    <div class="container-fluid">
        <div class="main m-5">
            <div class="heading mb-4 text-center">
                <h3 class="text-danger fw-bold">
                    Manage Events
                </h3>
            </div>
            <div class="events">
                <table class="table table-responsive table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Host</th>
                            <th>Venue</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td> <a href="{{ route('event.show',$event->slug) }}" style="text-decoration: none;" class="text-dark">{{ $event->name }}</a>
                                </td>
                                <td class="w-50">{{ $event->description }}</td>
                                <td>{{ $event->category->title }}</td>
                                <td>{{ $event->start_Date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->status->name }}</td>
                                <td>{{ $event->host->name }}</td>
                                <td> <a href="{{ route('mapview',$event->venue->id) }}" style="text-decoration: none;" class="text-dark">{{ $event->venue->name }}</a>
                                </td>
                                <td>{{ $event->price }}</td>

                                <td>
                                    <img
                                        src="{{  url('Events/'.$event->thumbnail) }}"
                                        class="img-fluid"
                                        alt="{{ $event->name }}"
                                        height="150px"
                                        width="250px"
                                    />
                                </td>
                                <td>
                                    <a href="{{ route('event.edit',$event->slug) }}" class="btn btn-sm text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('event.delete',$event->slug) }}" class="btn btn-sm text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-home.layout>
