@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Posts</h1>

        <div class="card">
            <div class="card-body">
                <a href="{{ action('Admin\PostsController@create') }}" class="btn btn-primary my-4">Create new Post</a>
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
                    @forelse($posts as $post)
                        <tr>
                            <td><a href="{{ action('Admin\PostsController@edit', $post->id) }}">{{ $post->id }}</a></td>
                            <td><a href="{{ action('Admin\PostsController@edit', $post->id) }}">{{ $post->title }}</a></td>
                            <td><a href="{{ action('Admin\PostsController@edit', $post->id) }}">{{ $post->created_at }}</a></td>
                            <td><a href="{{ action('Admin\PostsController@edit', $post->id) }}">{{ $post->updated_at }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nothing available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
