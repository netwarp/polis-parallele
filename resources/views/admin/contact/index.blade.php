@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1>Edit page: Contact</h1>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content">{{ $page->content ?? '' }}</textarea>
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
        var simplemde = new SimpleMDE();
    </script>
@endpush
