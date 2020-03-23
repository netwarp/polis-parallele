<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Event;
use App\Models\Page;

use GrahamCampbell\Markdown\Facades\Markdown;


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
        $podcasts = Podcast::orderBy('id')->paginate(10);

        return view('front.podcasts', compact('podcasts'));
    }

    /**
     * Page one Podcast
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function podcast(string $slug)
    {
        $podcast = Podcast::where('slug', $slug)->first();

        return view('front.podcast', compact('podcast'));
    }

    /**
     * Page Event
     * @return \Illuminate\View\View
     */
    public function events()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10);

        return view('front.events', compact('events'));
    }

    /**
     * Page Support
     * @return \Illuminate\View\View
     */
    public function support()
    {
        $page = Page::where('label', 'support')->first();

        return view('front.support', compact('page'));
    }

    /**
     * Page Contact
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $page = Page::where('label', 'contact')->first();

        return view('front.contact', compact('page'));
    }
}
