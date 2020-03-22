<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Models\Post;
use Str;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return response()->view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new Post';

        $action = action('Admin\PostsController@store');

        return response()->view('admin.posts.create_or_edit', compact('title', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'mimes:jpeg,png',
            'preview' => 'required',
            'content' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'preview' => $request->get('preview'),
            'content' => $request->get('content'),
        ];

        $post = Post::create($data);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = md5($data['title']);
            $complete_name = "{$name}.{$extension}";

            $data['banner'] = $complete_name;
            $file->storeAs("posts/{$post->id}", $complete_name);
        }

        $post->update($data);

        return redirect()->action('Admin\PostsController@index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $title = 'Edit post';

        $action = action('Admin\PostsController@update', $post->id);

        return response()->view('admin.posts.create_or_edit', compact('post', 'title', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'mimes:jpeg,png',
            'preview' => 'required',
            'content' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'preview' => $request->get('preview'),
            'content' => $request->get('content'),
        ];

        $post = Post::findOrFail($id);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = md5($data['title']);
            $complete_name = "{$name}.{$extension}";

            $data['banner'] = $complete_name;
            $file->storeAs("posts/{$post->id}", $complete_name);
        }

        $post->update($data);

        return redirect()->action('Admin\PostsController@index')->with('success', 'Post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        Storage::deleteDirectory("posts/{$post->id}");

        $post->delete();

        return redirect()->action('Admin\PostsController@index')->with('success', 'Post deleted');
    }
}
