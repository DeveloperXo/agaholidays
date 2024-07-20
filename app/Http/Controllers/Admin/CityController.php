<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    public function index_all()
    {
        $cities = City::paginate(10);
        return view('admin.cities.index', ['data' => $cities]);
    }

    public function index_create()
    {
        $countries = Country::all();
        return view('admin.cities.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'city_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        City::create($validatedData);

        return redirect()->back()->with('success', 'City created successfully.');
    }

    public function index_update(City $city)
    {
        $countries = Country::all();
        return view('admin.cities.create', ['data' => $city, 'countries' => $countries]);
    }

    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'city_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $city->update($validatedData);

        return redirect()->back()->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin_cities.view_all')->with('success', 'City deleted successfully.');
    }
}
