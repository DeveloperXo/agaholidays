<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function index_all () {
        $users = User::paginate(10);
        return view('admin.users.index', ['data' => $users]);
    }

    public function index_update ($id) {
        $data = User::where('id', $id)->first();
        return view('admin.users.view', ['data' => $data]);
    }

    public function destroy(Request $request, $id) {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin_users.view_all')->with('success', 'User deleted successfully.');
    }
}
