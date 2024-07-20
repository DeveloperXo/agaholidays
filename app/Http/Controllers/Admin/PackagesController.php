<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Package;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;

class PackagesController extends Controller
{
    public function index_all () {
        $packages = Package::paginate(10);
        return view('admin.packages.index', ['data' => $packages]);
    }

    public function index_create () {
        $categories = Category::where('status', 'published')->where('category_type', 'packages')->get();
        $countries = Country::get();
        $cities = City::get();
        return view('admin.packages.create', ['categories' => $categories, 'countries' => $countries, 'cities' => $cities]);
    }

    public function store (Request $request) {
        $validatedData = $this->validateRequest($request);
        
        $images = $this->handleImages($request->images);
        
        $tags = json_encode($validatedData['tags']);
        $infos = json_encode($validatedData['infos']);
        $includedExcluded = json_encode($validatedData['included_excluded']);
        $tourPlan = json_encode($validatedData['tour_plan']);
        

        Package::create([
            'package_name' => $validatedData['package_name'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'starting_price' => $validatedData['starting_price'],
            'category_id' => $validatedData['category_id'],
            'duration' => $validatedData['duration'],
            'tags' => $tags,
            'infos' => $infos,
            'images' => json_encode($images),
            'video' => $validatedData['video'] ?? '',
            'intro_text' => $validatedData['intro_text'],
            'body_text' => $validatedData['body_text'],
            'included_excluded' => $includedExcluded,
            'tour_plan' => $tourPlan,
            'tour_map' => $validatedData['tour_map'],
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        return redirect()->back()->with('success', 'Package created successfully.');
    }

    public function index_update ($id) {
        $data = Package::where('id', $id)->first();
        $categories = Category::where('status', 'published')->where('category_type', 'packages')->get();
        $countries = Country::get();
        $cities = City::get();
        return view('admin.packages.create', ['data' => $data, 'categories' => $categories, 'countries' => $countries, 'cities' => $cities]);
    }

    public function update(Request $request, $id) {
        $package = Package::findOrFail($id);
        $validatedData = $this->validateRequest($request);
        
        $existingImages = json_decode($package->images, true);
        $newImages = $this->handleImages($request->images);
        $images = array_merge($existingImages, $newImages);
        $tags = json_encode($validatedData['tags']);
        $infos = json_encode($validatedData['infos']);
        $includedExcluded = json_encode($validatedData['included_excluded']);
        $tourPlan = json_encode($validatedData['tour_plan']);


        $package->update([
            'package_name' => $validatedData['package_name'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'starting_price' => $validatedData['starting_price'],
            'category_id' => $validatedData['category_id'],
            'duration' => $validatedData['duration'],
            'tags' => $tags,
            'infos' => $infos,
            'images' => json_encode($images),
            'video' => $validatedData['video'] ?? '',
            'intro_text' => $validatedData['intro_text'],
            'body_text' => $validatedData['body_text'],
            'included_excluded' => $includedExcluded,
            'tour_plan' => $tourPlan,
            'tour_map' => $validatedData['tour_map'],
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);
    
        return redirect()->back()->with('success', 'Package updated successfully');
    }

    public function update_status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:draft,published',
        ]);

        $package = Package::findOrFail($id);

        $package->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function destroy(Request $request, $id) {
        $package = Package::findOrFail($id);

        $images = json_decode($package->images, true);

        if ($images) {
            foreach ($images as $image) {
                if (isset($image['url'])) {
                    Storage::disk('public')->delete($image['url']);
                }
            }
        }

        $package->delete();

        return redirect()->route('admin_packages.view_all')->with('success', 'Package deleted successfully.');
    }

    private function validateRequest($request)
    {
        $rules = [
            'package_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'starting_price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'duration' => 'required|string|max:255',
            'tags' => 'required|array',
            'tags.*.icon' => 'required|string',
            'tags.*.text' => 'required|string|max:255',
            'infos' => 'required|array',
            'infos.*.icon' => 'required|string',
            'infos.*.title' => 'required|string|max:255',
            'infos.*.text' => 'required|string|max:255',
            'images' => 'array',
            'images.*.file' => 'file|mimes:jpg,jpeg,png',
            'images.*.caption' => 'string|max:255',
            'video' => 'nullable|string|max:255',
            'intro_text' => 'required|string|max:255',
            'body_text' => 'required|string',
            'included_excluded' => 'required|array',
            'included_excluded.included.*.text' => 'required|string|max:255',
            'included_excluded.excluded.*.text' => 'required|string|max:255',
            'tour_plan' => 'required|array',
            'tour_plan.*.main_title' => 'required|string|max:255',
            'tour_plan.*.sub_title' => 'required|string|max:255',
            'tour_plan.*.body' => 'required|string',
            'tour_map' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ];
        return $request->validate($rules);
    }

    private function handleImages($images)
    {
        $imageData = [];

        if ($images) {
            foreach ($images as $index => $image) {
                if (isset($image['file'])) {
                    $path = $image['file']->store('packages', 'public');
                    $imageData[] = [
                        'url' => $path,
                        'caption' => $image['caption']
                    ];
                }
            }
        }

        return $imageData;
    }
}
