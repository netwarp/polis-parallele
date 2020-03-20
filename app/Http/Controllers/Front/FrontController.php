<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Welcome Home
     */
    public function index()
    {
        return view('front.index');
    }

    /**
     * Page Podcasts
     */
    public function podcasts()
    {
        return view('front.podcasts');
    }

    /**
     * Page Event
     */
    public function events()
    {
        return view('front.events');
    }

    /**
     * Page Support
     */
    public function support()
    {
        return view('front.support');
    }

    /**
     * Page Contact
     */
    public function contact()
    {
        return view('front.contact');
    }
}
