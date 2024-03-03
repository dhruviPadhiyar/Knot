<x-home.layout>
    <x-admin.navbar :notifications="$notifications"  />

    <div class="container mt-5">

        <div class="manageVenues">
            <table class="table table-repsonsive table-hover table-bordered">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Venue Name
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Longitude
                        </th>
                        <th>
                            Latitude
                        </th>
                        <th>Map view</th>
                        <th>Acrtion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $venue->name }}
                            </td>
                            <td>{{ $venue->address }} </td>
                            <td> {{ $venue->longitude }} </td>
                            <td> {{ $venue->latitude }} </td>

                            <td style="position: relative; height:200px; width:400px;" class="map">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                    <a href="{{ route('mapview',$venue->id) }}">
                                    <x-mapbox :id="'map' . $loop->index" class="mapview" style="width: 100%; height: 100%;"
                                        mapStyle="mapbox/navigation-night-v1" :center="['long' => $venue->longitude, 'lat' => $venue->latitude]" :navigationControls="true"
                                        :interactive="false" :markers="[
                                            [
                                                'long' => $venue->longitude,
                                                'lat' => $venue->latitude,
                                                'description' => $venue->name,
                                            ],
                                        ]" /> </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('venue.edit',$venue->id) }}" class="btn btn-sm text-danger"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('venue.delete',$venue->id) }}" class="btn btn-sm text-danger"> <i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-home.layout>
