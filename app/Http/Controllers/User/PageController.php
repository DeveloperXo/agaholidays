<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View {
        $data = ["name" => "Zaid"];
        $meta = ["title" => "Home"];
        return view('user.home.home', ['data' => $data, 'meta' => $meta]);
    }

    public function packages(): View {
        $meta = ["title" => "Packages"];
        $data = [
            "banner_title" => "Packages",
            "banner_text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."
        ];

        return view('user.packages.packages', ['meta' => $meta, 'data' => $data]);
    }

    public function package_single($id): View {
        $meta = ["title" => "Package name here"];
        $data = [
            "package_name" => "Packages",
            "banner_text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."
        ];

        return view('user.package_single.package_single', ['meta' => $meta, 'data' => $data]);
    }

    public function destinations(): View {
        $meta = ["title" => "Destinations"];
        $data = [
            "banner_title" => "Destinations",
            "banner_text" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."
        ];

        return view('user.destinations.destinations', ['meta' => $meta, 'data' => $data]);
    }
}
