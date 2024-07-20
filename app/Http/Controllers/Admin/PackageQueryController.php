<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PackageQuery;

class PackageQueryController extends Controller
{
    public function index_all () {
        $queries = PackageQuery::paginate(10);
        return view('admin.packageQueries.index', ['data' => $queries]);
    }

    public function index_update ($id) {
        $data = PackageQuery::where('id', $id)->first();
        return view('admin.packageQueries.view', ['data' => $data]);
    }

    public function destroy(Request $request, $id) {
        $query = PackageQuery::findOrFail($id);

        $query->delete();

        return redirect()->route('admin_package_queries.view_all')->with('success', 'Query deleted successfully.');
    }
}
