@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Support</h1>
    </div>

    <div class="container">
        <div class="card my-4">
            <div class="card-body">
                {{ $page->content }}
            </div>
        </div>
    </div>
@endsection
