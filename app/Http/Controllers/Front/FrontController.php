<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Models\Event;

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
     */
    public function events()
    {
        Markdown::convertToHtml([''], [], []); // <p>foo</p>
    //    return view('front.events');
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
