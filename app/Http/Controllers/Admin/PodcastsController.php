<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use Storage;
use Str;

class PodcastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::paginate(4);

        return response()->view('admin.podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new Podcast';

        $action = action('Admin\PodcastsController@store');

        return response()->view('admin.podcasts.create_or_edit', compact('title', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required | mimes:webm',
            'description' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'description' => $request->get('description'),
        ];

        $podcast = Podcast::create($data);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = md5($data['title']);
            $complete_name = "{$name}.{$extension}";

            $data['src'] = $complete_name;
            $file->storeAs("podcasts/{$podcast->id}", $complete_name);
        }

        $podcast->update($data);

        return redirect()->action('Admin\PodcastsController@index')->with('success', 'Podcast created');
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
        $podcast = Podcast::findOrFail($id);

        $title = 'Edit podcast';

        $action = action('Admin\PodcastsController@update', $podcast->id);

        return response()->view('admin.podcasts.create_or_edit', compact('podcast', 'title', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'description' => $request->get('description'),
        ];

        $podcast = Podcast::findOrFail($id);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = md5($data['title']);
            $complete_name = "{$name}.{$extension}";

            $data['src'] = $complete_name;
            $file->storeAs("podcasts/{$podcast->id}", $complete_name);
        }

        $podcast->update($data);

        return redirect()->action('Admin\PodcastsController@index')->with('success', 'Podcast created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $podcast = Podcast::findOrFail($id);

        Storage::deleteDirectory("podcasts/{$podcast->id}");

        $podcast->delete();

        return redirect()->action('Admin\PodcastsController@index')->with('success', 'Property deleted');
    }
}
