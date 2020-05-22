<?php

namespace App\Http\Controllers;

use App\Models\TypeFinding;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $typeFindings = TypeFinding::get();
        return view('dashboard',compact('typeFindings'));
    }
}
