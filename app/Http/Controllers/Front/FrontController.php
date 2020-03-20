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
     * Page Event
     */
    public function event()
    {

    }

    /**
     * Page Support
     */
    public function support()
    {

    }

    /**
     * Page Contact
     */
    public function contact()
    {

    }
}
