<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requester;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function map()
    {
        $requesters=Requester::whereNull('volunteer_id')->get();
        return view('map', compact('requesters'));
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }
}
