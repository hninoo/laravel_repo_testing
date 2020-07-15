<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function demo() {
        $feed = Feeds::make('http://thevoicemyanmar.com/feed');

        // dd($feed);

        $data = array(
          'title'     => $feed->get_title(),
          'permalink' => $feed->get_permalink(),
          'items'     => $feed->get_items(),
        );
    
       return $data;
        // return View::make('feed', $data);

      }
}
