<x-home.layout>
    <x-user.navbar :notifications="$notifications" />
    <div class="container mt-5">
        <div class="row">
            @if ($hostedEvents->count())
                <h3>Total Hosted Events : {{ $hostedEvents->count() }}</h3>
            @endif
            <div class="col-6">
                <div class="yourRequests m-5 p-4 border shadow rounded">
                    <h4>Your Requests</h4>
                </div>
            </div>
            <div class="col-6">
                Make new Request
            </div>
        </div>
    </div>
</x-home.layout>
