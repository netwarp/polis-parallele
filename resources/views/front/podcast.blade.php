@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Podcasts</h1>
    </div>

    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <h2>{{ $podcast->title }}</h2>
            </div>
            <div class="card-body">
                <div>
                    <audio src="/resource/podcasts/{{ $podcast->id }}/{{ $podcast->src }}" preload="auto" />
                </div>
                <div>
                    {{ $podcast->description }}
                </div>
                <div>
                    <a href="{{ action('Front\FrontController@podcast', $podcast->slug) }}" class="btn btn-primary">Plus</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/audiojs/1.0.1/audio.min.js"></script>
    <script>
        audiojs.events.ready(function() {
            var as = audiojs.createAll();
        });
    </script>
@endpush
