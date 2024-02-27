<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenueRequest;
use App\Models\Venue;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VenueController extends Controller
{
    public function create()
    {
        return view("venue.create");
    }

    public function store(Request $request)
    {
        // $request->validated($request->all());
        $venue = new Venue();

        $address = urlencode($request->input('address'));
        if (empty($address)) {
            return redirect()->back()->with('error', 'Address is empty');
        }

        $access_token = env('MAPBOX_TOKEN');
        $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/{$address}.json?access_token={$access_token}";

        $response = Http::get($url);
        // dd($response);
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['features'][0]['geometry']['coordinates'])) {
                $coordinates = $data['features'][0]['geometry']['coordinates'];
                $latitude = $coordinates[1];
                $longitude = $coordinates[0];
                // return "Latitude: $latitude, Longitude: $longitude";

                //storing to the database
                $venue->name = $request->name;
                $venue->address = $request->address;
                $venue->longitude = $longitude;
                $venue->latitude = $latitude;
                $venue->save();

                toastr()->success('Venue has been added successfully!');
                return back();

            } else {
                return redirect()->back()->with('error', 'Unable to get coordinates from response');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to fetch data from Mapbox API');
        }
    }

    public function edit($id)
    {
        $venue = Venue::find($id)->first();
        return view('venue.edit', compact('venue'));
    }
    public function update(Request $request, $id)
    {
        // $request->validated($request->all());
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',

            // Add validation rules for other fields as needed
        ]);
        $venue = Venue::find($id);

        // Check if the address field is present in the request
        if ($request->filled('address')) {
            $address = urlencode($request->input('address'));

            if (empty($address)) {
                return redirect()->back()->with('error', 'Address is empty');
            }

            $access_token = env('MAPBOX_TOKEN');
            $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/{$address}.json?access_token={$access_token}";

            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['features'][0]['geometry']['coordinates'])) {
                    $coordinates = $data['features'][0]['geometry']['coordinates'];
                    $venue->longitude = $coordinates[0];
                    $venue->latitude = $coordinates[1];
                } else {
                    return redirect()->back()->with('error', 'Unable to get coordinates from response');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to fetch data from Mapbox API');
            }
        }

        // Update name if present in request
        if ($request->filled('name')) {
            $venue->name = $request->name;
        }

        // Save changes
        $venue->save();

        toastr()->success('Venue details has been updated successfully!');
        return back();
    }

    public function destroy($id){
        $venue = Venue::find($id);
        $venue->delete();
        toastr()->success('Venue has been deleted successfully!');
        return redirect()->route('venue.manage');
    }

    public function manage()
    {
        $venues = Venue::all();
        return view('venue.manage', compact('venues'));
    }
    public function mapview($id)
    {
        $venue = Venue::find($id)->first();
        return view("venue.mapview", compact("venue"));
    }
}
