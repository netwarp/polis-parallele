@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Blog</h1>
    </div>

    <div class="container">
        @forelse($posts as $post)
            <div class="card my-4">
                <div class="card-header">
                    <h2>{{ $post->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="my-4">
                        {{ $post->preview }}
                    </div>
                    <div>
                        <a href="{{ action('Front\BlogController@post', $post->slug) }}" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        @empty
            Nothing
        @endforelse

        {{ $posts->links() }}
    </div>
@endsection
