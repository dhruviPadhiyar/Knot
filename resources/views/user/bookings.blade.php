<x-home.layout>
    <x-user.navbar :notifications="$notifications"/>
    <div class="container">
        <div class="text-center heading">
            <h1 class="text-danger">
                Your bookings
            </h1>
        </div>
        <div class="bookingCount m-5">
            <h4>Total Bookings:{{ $booking->count() }} </h4>
        </div>
        <div class="main m-5">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Ticket Quantity</th>
                        <th>Price Per Ticket</th>
                        <th>Paid Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($booking as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->event->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->event->price }}</td>
                            @php
                                $p = $item->event->price;
                                $q = $item->quantity;

                                $total = $p*$q;
                            @endphp
                            <td>{{ $total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-home.layout>
