@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Podcasts</h1>

        <div class="card">
            <div class="card-body">
                <a href="{{ action('Admin\PodcastsController@create') }}" class="btn btn-primary my-4">Create new Podcast</a>
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
                    @forelse($podcasts as $podcast)
                        <tr>
                            <td><a href="{{ action('Admin\PodcastsController@edit', $podcast->id) }}">{{ $podcast->id }}</a></td>
                            <td><a href="{{ action('Admin\PodcastsController@edit', $podcast->id) }}">{{ $podcast->title }}</a></td>
                            <td><a href="{{ action('Admin\PodcastsController@edit', $podcast->id) }}">{{ $podcast->created_at }}</a></td>
                            <td><a href="{{ action('Admin\PodcastsController@edit', $podcast->id) }}">{{ $podcast->updated_at }}</a></td>
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
