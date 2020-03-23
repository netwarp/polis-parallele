<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('front.blog', compact('posts'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('front.post', compact('post'));
    }
}
