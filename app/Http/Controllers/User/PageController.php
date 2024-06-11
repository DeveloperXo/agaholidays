<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View {
        $data = ["name" => "Zaid"];
        $title = "Home";
        return view('user.home.home', ['data' => $data, 'title' => $title]);
    }
}
