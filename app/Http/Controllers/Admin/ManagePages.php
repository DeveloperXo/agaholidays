<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\PageMeta;

class ManagePages extends Controller
{
    public function index() {
        $pages = PageMeta::paginate(10);
        return view('admin.manage_pages.index', ['data' => $pages]);
    }

    public function index_single($id) {
        $page = PageMeta::where('id', $id)->first();
        return view('admin.manage_pages.create', ['data' => $page]);
    }

    public function index_single_create() {
        return view('admin.manage_pages.create');
    }

    public function store(Request $request) {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'status' => 'nullable|string|in:draft,published',
            'page_meta_title' => 'nullable|string',
            'page_meta_description' => 'nullable|string',
            'page_url' => 'required|string',
            'page_name' => 'required|string',
            'banner_title' => 'nullable|string',
            'banner_text' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5048',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('banner_images', 'public');
        }

        PageMeta::create($data);

        return redirect()->back()->with('success', 'Page created successfully.');
    }

    public function update(Request $request, $id) {
        
        $request->validate([
            'page_title' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:draft,published',
            'page_meta_title' => 'nullable|string',
            'page_meta_description' => 'nullable|string',
            'page_url' => 'nullable|string',
            'page_name' => 'nullable|string',
            'banner_title' => 'nullable|string',
            'banner_text' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5048',
        ]);

        $pageMeta = PageMeta::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('banner_image')) {
            if ($pageMeta->banner_image) {
                Storage::disk('public')->delete($pageMeta->banner_image);
            }

            $data['banner_image'] = $request->file('banner_image')->store('banner_images', 'public');
        }

        $pageMeta->update($data);

        return redirect()->back()->with('success', 'Page updated successfully.');
        
    }

    public function destroy($id) {
        $pageMeta = PageMeta::findOrFail($id);

        if ($pageMeta->banner_image) {
            Storage::disk('public')->delete($pageMeta->banner_image);
        }

        $pageMeta->delete();

        return redirect()->route('admin_manage_pages')->with('success', 'Page deleted successfully.');
    }

}
