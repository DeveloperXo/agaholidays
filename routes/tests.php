<?php

use Illuminate\Support\Facades\Route;

Route::get('/tests/fonts', function () {
    return view('notes.notes');
});