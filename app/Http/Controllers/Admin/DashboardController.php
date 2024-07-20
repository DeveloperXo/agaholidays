<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PackageQuery;
use App\Models\ContactQuery;
use App\Models\Package;
use App\Models\Blog;
use App\Models\Destination;

class DashboardController extends Controller
{
    public function index () {
        $data = new \stdClass();
        $data->package_queries_count = PackageQuery::count();
        $data->contact_queries_count = ContactQuery::count();
        $data->user_count = User::count();
        $data->blogs_count = Blog::count();
        $data->packages_count = Package::count();
        $data->destinations_count = Destination::count();
        $data->package_queries = PackageQuery::orderBy('id', 'DESC')->paginate(5);
        $data->users = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.dashboard.dashboard', ['data' => $data]);
    }
}
