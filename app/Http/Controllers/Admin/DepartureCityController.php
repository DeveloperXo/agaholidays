<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DepartureCity;

class DepartureCityController extends Controller
{
    public function index_all()
    {
        $departureCities = DepartureCity::paginate(10);
        return view('admin.departureCities.index', ['data' => $departureCities]);
    }

    public function index_create()
    {
        return view('admin.departureCities.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'place_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        DepartureCity::create($validatedData);

        return redirect()->back()->with('success', 'Departure city created successfully.');
    }

    public function index_update(DepartureCity $departureCity)
    {
        return view('admin.departureCities.create', ['data' => $departureCity]);
    }

    public function update(Request $request, DepartureCity $departureCity)
    {
        $validatedData = $request->validate([
            'place_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $departureCity->update($validatedData);

        return redirect()->back()->with('success', 'Departure city updated successfully.');
    }

    public function destroy(DepartureCity $departureCity)
    {
        $departureCity->delete();

        return redirect()->route('admin_departure_cities.view_all')->with('success', 'Departure city deleted successfully.');
    }
}
