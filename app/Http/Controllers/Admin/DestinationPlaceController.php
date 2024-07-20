<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DestinationPlace;

class DestinationPlaceController extends Controller
{
    public function index_all()
    {
        $destinationPlaces = DestinationPlace::paginate(10);
        return view('admin.destinationPlaces.index', ['data' => $destinationPlaces]);
    }

    public function index_create()
    {
        return view('admin.destinationPlaces.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'place_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        DestinationPlace::create($validatedData);

        return redirect()->back()->with('success', 'Destination place created successfully.');
    }

    public function index_update(DestinationPlace $destinationPlace)
    {
        return view('admin.destinationPlaces.create', ['data' => $destinationPlace]);
    }

    public function update(Request $request, DestinationPlace $destinationPlace)
    {
        $validatedData = $request->validate([
            'place_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $destinationPlace->update($validatedData);

        return redirect()->back()->with('success', 'Destination place updated successfully.');
    }

    public function destroy(DestinationPlace $destinationPlace)
    {
        $destinationPlace->delete();

        return redirect()->route('admin_destination_places.view_all')->with('success', 'Destination place deleted successfully.');
    }
}
