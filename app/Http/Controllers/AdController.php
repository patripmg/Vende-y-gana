<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function create() {
        return view('ads.create');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
