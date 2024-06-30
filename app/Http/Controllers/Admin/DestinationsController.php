<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Destination;

class DestinationsController extends Controller
{
    public function index_all () {
        $destinations = Destination::paginate(10);
        // dd($destinations);
        return view('admin.destinations.destinations', ['data' => $destinations]);
    }

    public function index_create () {
        return view('admin.destinations.destinations_create');
    }

    public function store (Request $request) {
        $validatedData = $this->validateRequest($request);

        $tourDetails = json_encode($validatedData['tour_details']);
        $images = $this->handleImages($request->images);

        Destination::create([
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'overview' => $validatedData['overview'],
            'info' => $validatedData['info'],
            'tour_details' => $tourDetails,
            'map' => $validatedData['map'],
            'images' => json_encode($images),
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        return redirect()->back()->with('success', 'Destination created successfully.');
    }

    public function index_update ($id) {
        $data = Destination::where('id', $id)->first();
        return view('admin.destinations.destinations_create', ['data' => $data]);
    }

    public function update(Request $request, $id) {
        $validatedData = $this->validateRequest($request);
        $destination = Destination::findOrFail($id);
        
        $tourDetails = json_encode($validatedData['tour_details']);
        $existingImages = json_decode($destination->images, true);
        $newImages = $this->handleImages($request->images);
        
        $images = array_merge($existingImages, $newImages);

        $destination->update([
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'overview' => $validatedData['overview'],
            'info' => $validatedData['info'],
            'tour_details' => $tourDetails,
            'map' => $validatedData['map'],
            'images' => json_encode($images),
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);
    
        return redirect()->back()->with('success', 'Destination updated successfully');
    }

    public function update_status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:draft,published',
        ]);

        $destination = Destination::findOrFail($id);

        $destination->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function destroy(Request $request, $id) {
        $destination = Destination::find($id);

        if (!$destination) {
            return redirect()->route('admin_destinations.view_all')->with('error', 'Destination not found.');
        }

        if ($destination->featured_image && Storage::exists('public/' . $destination->featured_image)) {
            Storage::delete('public/' . $destination->featured_image);
        }

        $destination->delete();

        return redirect()->route('admin_destinations.view_all')->with('success', 'Destination deleted successfully.');
    }

    private function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'overview' => 'required|string',
            'info' => 'required|string',
            'tour_details' => 'required|array',
            'map' => 'required|string',
            'images' => 'array',
            'images.*.file' => 'file|mimes:jpg,jpeg,png',
            'images.*.caption' => 'string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);
    }

    private function handleImages($images)
    {
        $imageData = [];

        if ($images) {
            foreach ($images as $index => $image) {
                if (isset($image['file'])) {
                    $path = $image['file']->store('destinations', 'public');
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
