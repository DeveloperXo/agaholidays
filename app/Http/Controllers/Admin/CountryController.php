<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller
{
    public function index_all()
    {
        $countries = Country::paginate(10);
        return view('admin.countries.index', ['data' => $countries]);
    }

    public function index_create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'country_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Country::create($validatedData);

        return redirect()->back()->with('success', 'Country created successfully.');
    }

    public function index_update(Country $country)
    {
        return view('admin.countries.create', ['data' => $country]);
    }

    public function update(Request $request, Country $country)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'country_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $country->update($validatedData);

        return redirect()->back()->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin_countries.view_all')->with('success', 'Country deleted successfully.');
    }
}
