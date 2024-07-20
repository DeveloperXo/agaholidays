<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index_all () {
        $categories = Category::paginate(10);
        return view('admin.categories.index', ['data' => $categories]);
    }

    public function index_create () {
        return view('admin.categories.create');
    }

    public function store (Request $request) {
        $validatedData = $this->validateRequest($request);

        $imagePath = $this->handleImage($request);

        Category::create([
            'status' => $validatedData['status'] ?? 'draft',
            'category_name' => $validatedData['category_name'],
            'category_type' => $validatedData['category_type'],
            'intro_text' => $validatedData['intro_text'],
            'image' => $imagePath,
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function index_update ($id) {
        $data = Category::where('id', $id)->first();
        return view('admin.categories.create', ['data' => $data]);
    }

    public function update(Request $request, $id) {
        $validatedData = $this->validateRequest($request);

        $category = Category::findOrFail($id);

        $imagePath = $this->handleImage($request, $category->image);

        $category->update([
            'category_name' => $validatedData['category_name'],
            'category_type' => $validatedData['category_type'],
            'intro_text' => $validatedData['intro_text'],
            'image' => $imagePath,
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
        ]);
    
        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function update_status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:draft,published',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function destroy(Request $request, $id) {
        $category = Category::findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin_categories.view_all')->with('success', 'Category deleted successfully.');
    }

    private function validateRequest($request)
    {
        return $request->validate([
            'status' => 'nullable|string|in:draft,published',
            'category_name' => 'required|string|max:255',
            'category_type' => 'required|string|max:255',
            'intro_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);
    }

    private function handleImage($request, $currentImagePath = null)
    {
        if ($request->hasFile('image')) {
            if ($currentImagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }
            return $request->file('image')->store('categories', 'public');
        }
        return $currentImagePath;
    }
}
