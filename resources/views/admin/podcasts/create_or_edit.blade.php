@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1 class="h2 d-inline">
                    {{ $title }}
                    @if (isset($podcast))
                        <a href="/podcasts/{{ $podcast->slug }}" class="btn btn-primary" target="_blank">view online</a>
                    @endif
                </h1>

                @if (isset($podcast))
                    <form method="POST" action="{{ action('Admin\PodcastsController@destroy', $podcast->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Str::contains(Route::currentRouteAction(), 'edit'))
                        @method('put')
                    @endif

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $podcast->title ?? old('title') ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="src">Source from Youtube</label>
                        <input type="text" class="form-control" name="src" value="{{ $podcast->src ?? old('src') ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="10">{{ $podcast->description ?? old('description') ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
