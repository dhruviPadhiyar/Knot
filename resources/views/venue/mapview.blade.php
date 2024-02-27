<x-home.layout >

    <div class="container mt-5">
        <div class="row shadow m-5 p-3 rounded bg-body-tertiary">
            <div class="goBack mb-3">
                <a href="{{ url()->previous() }}" class="btn btn-sm"> <strong><- Go to the Manage page</strong></a>
            </div>
            <div class="col-sm-6">
                <div style="position: relative; height:350px; width:550px;" class="map">
                    <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                        <a href="{{ route('mapview',$venue->id) }}">
                        <x-mapbox :id="'map' . $venue->id" class="mapview" style="width: 100%; height: 100%;"
                            mapStyle="mapbox/navigation-night-v1" :center="['long' => $venue->longitude, 'lat' => $venue->latitude]" :navigationControls="true"
                            :interactive="false" :markers="[
                                [
                                    'long' => $venue->longitude,
                                    'lat' => $venue->latitude,
                                    'description' => $venue->name,
                                ],
                            ]" /> </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- venue details --}}
                <div class="title text-center">
                    <h3 class="fw-bold">Venue Details</h3>
                </div>
                <div class="venueDetails m-4 p-3">
                    <table class="table table-responsive table-borderless">
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                {{ $venue->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $venue->address }}</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>{{ $venue->longitude }}</td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>{{ $venue->latitude }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-home.layout>
