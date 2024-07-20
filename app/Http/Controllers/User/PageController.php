<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\PageMeta;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\DestinationPlace;
use App\Models\DepartureCity;

class PageController extends Controller
{
    public function home(): View {
        $packages = Package::where('status', 'published')->paginate(4);
        $destinations = Destination::where('status', 'published')->paginate(10);
        $blogs = Blog::where('status', 'published')->paginate(6);
        $countries = Country::get();
        $data = ["name" => "Zaid"];
        $meta = PageMeta::where('page_name', 'home_page')->where('status', 'published')->first();
        return view('user.home.home', ['data' => $data, 'meta' => $meta, 'packages' => $packages, 'destinations' => $destinations, 'blogs' => $blogs, 'countries' => $countries]);
    }

    public function packages(): View {
        $meta = PageMeta::where('page_name', 'packages_page')->where('status', 'published')->first();
        $packages = Package::where('status', 'published')->paginate(10);
        $categories = Category::where('status', 'published')->where('category_type', 'packages')->get();

        return view('user.packages.packages', ['meta' => $meta, 'data' => [], 'packages' => $packages, 'categories' => $categories]);
    }

    public function package_single($id): View {
        $package = Package::where('id', $id)->where('status', 'published')->first();
        $destination_places = DestinationPlace::get();
        $departure_cities = DepartureCity::get();
        $meta = new \stdClass();
        if (!is_null($package)) {
            $meta->banner_title = $package->package_name;
            $meta->banner_text = $package->intro_text;
            $meta->banner_image = json_decode($package->images)[0]->url;
            $meta->page_title = $package->package_name;
            $meta->page_meta_title = $package->meta_title;
            $meta->page_meta_description = $package->meta_description;
        } else {
            abort(404);
        }

        return view('user.package_single.package_single', ['meta' => $meta, 'data' => [], 'package' => $package, 'destination_places' => $destination_places, 'departure_cities' => $departure_cities]);
    }

    public function destinations(): View {
        $destinations = Destination::where('status', 'published')->paginate(10);
        $meta = PageMeta::where('page_name', 'destinations_page')->where('status', 'published')->first();

        return view('user.destinations.destinations', ['meta' => $meta, 'data' => [], 'destinations' => $destinations]);
    }

    public function destination_single($id): View {
        $destination = Destination::where('id', $id)->where('status', 'published')->first();

        $meta = new \stdClass();
        if (!is_null($destination)) {
            $meta->banner_title = $destination->title;
            $meta->banner_text = $destination->text;
            $meta->banner_image = json_decode($destination->images)[0]->url ?? '';
            $meta->page_title = $destination->title;
            $meta->page_meta_title = $destination->meta_title;
            $meta->page_meta_description = $destination->meta_description;
        } else {
            abort(404);
        }

        return view('user.destination_single.destination_single', ['meta' => $meta, 'data' => [], 'destination' => $destination]);
    }

    public function blogs(): View {
        $meta = PageMeta::where('page_name', 'blogs_page')->where('status', 'published')->first();
        $blogs = Blog::where('status', 'published')->paginate(10);
        $categories = Category::where('status', 'published')->where('category_type', 'blogs')->get();

        return view('user.blogs.blogs', ['meta' => $meta, 'data' => [], 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function blog_single($id): View {
        $blog = Blog::where('id', $id)->where('status', 'published')->first();
        $blogs = Blog::where('status', 'published')->paginate(10);
        $categories = Category::where('status', 'published')->where('category_type', 'blogs')->get();
        $meta = new \stdClass();
        if (!is_null($blog)) {
            $meta->page_title = $blog->blog_title;
            $meta->page_meta_title = $blog->meta_title;
            $meta->page_meta_description = $blog->meta_description;
        } else {
            abort(404);
        }

        return view('user.blog_single.blog_single', ['meta' => $meta, 'data' => [], 'blog' => $blog, 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function about(): View {
        $meta = PageMeta::where('page_name', 'about_page')->where('status', 'published')->first();
        $data = [];

        return view('user.about.about', ['meta' => $meta, 'data' => $data]);
    }

    public function contact(): View {
        $meta = PageMeta::where('page_name', 'contact_page')->where('status', 'published')->first();
        $data = [];

        return view('user.contact.contact', ['meta' => $meta, 'data' => $data]);
    }

    public function privacy_policy(): View {
        $meta = PageMeta::where('page_name', 'privacy_policy_page')->where('status', 'published')->first();
        $data = [];

        return view('user.privacy_policy.privacy_policy', ['meta' => $meta, 'data' => $data]);
    }

    public function terms_and_conditions(): View {
        $meta = PageMeta::where('page_name', 'terms_and_conditions_page')->where('status', 'published')->first();
        $data = [];

        return view('user.terms_and_conditions.terms_and_conditions', ['meta' => $meta, 'data' => $data]);
    }
}
