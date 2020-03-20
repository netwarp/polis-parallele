@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Create new Podcast</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ action('Admin\PodcastsController@store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $podcast->title ?? old('title') ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="file">File (webm or mp3)</label>
                        <input type="file" class="" name="file" accept="audio/*">
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
