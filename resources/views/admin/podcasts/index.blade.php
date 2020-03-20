@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Podcasts</h1>

        <div class="card">
            <div class="card-body">
                <a href="{{ action('Admin\PodcastsController@create') }}" class="btn btn-primary my-4">Create new Podcast</a>
                <table class="table">
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
                            <td>{{ $podcast->id }}</td>
                            <td>{{ $podcast->title }}</td>
                            <td>{{ $podcast->created_at }}</td>
                            <td>{{ $podcast->updated_at }}</td>
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
