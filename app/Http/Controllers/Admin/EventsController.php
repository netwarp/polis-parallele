<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Str;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10);

        return response()->view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new Event';

        $action = action('Admin\EventsController@store');

        return response()->view('admin.events.create_or_edit', compact('title', 'action'));
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
            'date' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
        ];

        Event::create($data);

        return redirect()->action('Admin\EventsController@index')->with('success', 'Podcast created');
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
        $event = Event::findOrFail($id);

        $title = 'Edit event';

        $action = action('Admin\EventsController@update', $event->id);

        return response()->view('admin.events.create_or_edit', compact('event', 'title', 'action'));
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
        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
        ];

        $event = Event::findOrFail($id);

        $event->update($data);

        return redirect()->action('Admin\EventsController@index')->with('success', 'Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->action('Admin\EventsController@index')->with('success', 'Event deleted');
    }
}
