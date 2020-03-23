@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Podcasts</h1>
    </div>

    <div class="container">
        @forelse($podcasts as $podcast)
            <div class="card my-4">
                <div class="card-header">
                    <h2>{{ $podcast->title }}</h2>
                </div>
                <div class="card-body">
                    <div>
                        {{ $podcast->description }}
                    </div>
                    <div>
                        <a href="{{ action('Front\FrontController@podcast', $podcast->slug) }}" class="btn btn-primary">Plus</a>
                    </div>
                </div>
            </div>
        @empty
            Nothing
        @endforelse

        {{ $podcasts->links() }}
    </div>
@endsection
