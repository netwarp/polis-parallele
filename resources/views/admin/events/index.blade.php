@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Events</h1>

        <div class="card">
            <div class="card-body">
                <a href="{{ action('Admin\EventsController@create') }}" class="btn btn-primary my-4">Create new Event</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td><a href="{{ action('Admin\EventsController@edit', $event->id) }}">{{ $event->id }}</a></td>
                            <td><a href="{{ action('Admin\EventsController@edit', $event->id) }}">{{ $event->title }}</a></td>
                            <td><a href="{{ action('Admin\EventsController@edit', $event->id) }}">{{ $event->created_at }}</a></td>
                            <td><a href="{{ action('Admin\EventsController@edit', $event->id) }}">{{ $event->updated_at }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td>Nothing available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
