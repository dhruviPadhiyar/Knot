<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VenueApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venue = Venue::all();
        return response()->json($venue);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venue = new Venue();

        $address = urlencode($request->input('address'));
        if (empty($address)) {
            return response()->json(['error', 'Address is empty']);
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

                return response()->json(['success', 'venue created successfully!']);

            } else {
                return response()->json(["error", "unable to fetch coordinates"]);
            }
        } else {
            return response()->json(['error', 'Failed to fetch data from Mapbox API']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::find($id);
        return response()->json($venue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
                return response()->json(['error', 'Address is empty']);
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
                    return response()->json(['error', 'Unable to get coordinates from response']);
                }
            } else {
                return response()->json(['error', 'Failed to fetch data from Mapbox API']);
            }
        }
        // Update name if present in request
        if ($request->filled('name')) {
            $venue->name = $request->name;
        }
        // Save changes
        $venue->save();
        return response()->json(['success', "venue edited!"]);
    }

    public function destroy(string $id)
    {
        $venue = Venue::find($id);
        $venue->delete();
        return response()->json(["success","venue deleted!"]);
    }
}
