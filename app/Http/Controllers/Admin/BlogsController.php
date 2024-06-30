<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Blog;
use App\Models\Category;

class BlogsController extends Controller
{
    public function index_all () {
        $blogs = Blog::paginate(10);
        return view('admin.blogs.blogs', ['data' => $blogs]);
    }

    public function index_create () {
        $categories = Category::where('status', 'published')->get();
        return view('admin.blogs.blogs_create', ['categories' => $categories]);
    }

    public function store (Request $request) {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'status' => 'nullable|string|in:draft,published',
            'intro_text' => 'required|string',
            'blog_content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id', // belongs to categories table
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:5048',
            'tags' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::id();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog_images', 'public');
        }

        Blog::create($data);

        return redirect()->back()->with('success', 'Blog created successfully.');
    }

    public function index_update ($id) {
        $data = Blog::where('id', $id)->first();
        $categories = Category::where('status', 'published')->get();
        return view('admin.blogs.blogs_create', ['data' => $data, 'categories' => $categories]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'blog_title' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:draft,published',
            'intro_text' => 'nullable|string',
            'blog_content' => 'nullable|string',
            'category_id' => 'nullable|integer|exists:categories,id', // belongs to categories table
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5048',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);


        $blog = Blog::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')->store('blog_images', 'public');
        }

        $blog->update($data);
        return redirect()->back()->with('success', 'Blog updated successfully.');
    }

    public function destroy(Request $request, $id) {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('admin_blogs.view_all')->with('error', 'Blog not found.');
        }

        if ($blog->featured_image && Storage::exists('public/' . $blog->featured_image)) {
            Storage::delete('public/' . $blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin_blogs.view_all')->with('success', 'Blog deleted successfully.');
    }
}
