@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Blog</h1>
    </div>

    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <div class="my-4">
                    @markdown($post->content)
                </div>
            </div>
        </div>
    </div>
@endsection
