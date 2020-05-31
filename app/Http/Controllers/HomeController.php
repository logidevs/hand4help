<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requester;
use GuzzleHttp\Client;

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
    public function covid_statistics()
    {
        $url = "https://api.covid19api.com/summary";
        $url_serbia="https://api.apify.com/v2/key-value-stores/aHENGKUPUhKlX97aL/records/LATEST?disableRedirect=true";
        $url_kosovo="https://api.apify.com/v2/key-value-stores/C10heVVVE8yBd1YvF/records/LATEST?disableRedirect=true";
        $client = new Client();
        $response1 = $client->request('GET', $url_serbia);
        $covid_serbia=json_decode($response1->getBody());
        $response2 = $client->request('GET', $url_kosovo);
        $covid_kosovo=json_decode($response2->getBody());


        return view('covid2',compact('covid_serbia', 'covid_kosovo'));
    }
}
