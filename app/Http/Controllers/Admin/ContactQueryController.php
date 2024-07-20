<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ContactQuery;

class ContactQueryController extends Controller
{

    public function index_all() {
        $queries = ContactQuery::paginate(10);
        return view('admin.contactQueries.index', ['data' => $queries]);
    }

    public function index_update($id) {
        $query = ContactQuery::findOrFail($id);
        return view('admin.contactQueries.view', ['data' => $query]);
    }

    public function destroy($id) {
        $query = ContactQuery::findOrFail($id);
        $query->delete();

        return redirect()->route('admin_contact_queries.view_all')->with('success', 'Contact query deleted successfully.');
    }
}
