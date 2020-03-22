@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1 class="h2 d-inline">
                    {{ $title }}
                    @if (isset($post))
                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary" target="_blank">view online</a>
                    @endif
                </h1>

                @if (isset($post))
                    <form method="POST" action="{{ action('Admin\PostsController@destroy', $post->id) }}">
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
                        <input type="text" class="form-control" name="title" value="{{ $post->title ?? old('title') ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="file">File (jpf or png)</label>
                        <input type="file" class="" name="file" accept=".jpg/.png">
                    </div>

                    <div class="form-group">
                        <label for="preview">Preview</label>
                        <textarea name="preview" class="form-control" rows="4">{{ $post->preview ?? old('preview') ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content">{{ $post->content ?? old('content') ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        var simplemde = new SimpleMDE({
            element: document.querySelector('#content')
        });
    </script>
@endpush
