<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\PageMeta;
use App\Models\Category;
use App\Models\Blog;

class SearchController extends Controller
{
    public function filter_packages (Request $request) {
        $query = Package::query();

        // Filter by package name
        if ($request->has('package_name') && !empty($request->package_name)) {
            $query->where('package_name', 'like', '%' . $request->package_name . '%');
        }

        if ($request->has('country') && !empty($request->country)) {
            $query->where('country', 'like', '%' . $request->country . '%');
        }

        // Filter by multiple category IDs
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->whereIn('category_id', $request->category_id);
        }

        // Filter by price range
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('starting_price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('starting_price', '<=', $request->max_price);
        }

        // Filter by multiple durations
        if ($request->has('duration') && !empty($request->duration)) {
            $query->whereIn('duration', $request->duration);
        }

        // Get the results
        $query->where('status', 'published');
        $packages = $query->paginate(10);

        $meta = PageMeta::where('page_name', 'packages_page')->where('status', 'published')->first();
        $categories = Category::where('status', 'published')->where('category_type', 'packages')->get();

        return view('user.packages.packages', ['packages' => $packages, 'meta' => $meta, 'categories' => $categories]);
    }

    public function filter_blogs (Request $request) {
        $query = Blog::query();

        // Filter by blog name
        if ($request->has('blog_title') && !empty($request->blog_title)) {
            $query->where('blog_title', 'like', '%' . $request->blog_title . '%');
        }

        // Filter by category
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->whereIn('category_id', $request->category_id);
            $category = Category::where('status', 'published')->where('id', $request->category_id)->first();
            if ($category) {
                $meta = new \stdClass();
                $meta->page_title = $category->category_name;
                $meta->banner_title = 'Category: '.$category->category_name;
                $meta->banner_text = $category->intro_text;
                $meta->banner_image = $category->image;
                $meta->page_meta_title = $category->meta_title;
                $meta->page_meta_description = $category->meta_description;
            }
        }

        $query->where('status', 'published');

        // Get the results
        if (!isset($category)) {
            $meta = PageMeta::where('page_name', 'blogs_page')->where('status', 'published')->first();
        }
        $blogs = $query->paginate(10);
        $categories = Category::where('status', 'published')->where('category_type', 'blogs')->get();
        

        return view('user.blogs.blogs', ['meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }
}
