<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\PackageQuery;
use App\Models\ContactQuery;

class FormController extends Controller
{
    public function index (): View {

    }
    public function store_package_query (Request $request) {
        $validatedData = $request->validate([
            'package_id' => 'nullable|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date|after:today',
            'departure_city' => 'required|string|max:255',
            'adult' => 'required|integer|min:0',
            'child' => 'required|integer|min:0',
            'infant' => 'required|integer|min:0',
        ]);

        PackageQuery::create([
            'package_id' => $request->package_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'destination' => $request->destination,
            'departure_date' => $request->departure_date,
            'departure_city' => $request->departure_city,
            'adult' => $request->adult,
            'child' => $request->child,
            'infant' => $request->infant,
        ]);

        return redirect()->route('user_thankyou');
    }

    public function store_contact_query (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactQuery::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return redirect()->route('user_thankyou');
    }

    public function thankyou (): View {
        return view('user.thankyou.thankyou');
    }

}
