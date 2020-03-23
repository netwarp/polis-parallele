@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Events</h1>
    </div>

    <div class="container">
        @forelse($events as $event)
            <div class="card my-4">
                <div class="card-header">
                    <h2>{{ $event->title ?? '' }}</h2>
                </div>
                <div class="card-body">
                    <div>
                        {{ $event->date ?? '' }}
                    </div>
                    <div>
                        {{ $event->description ?? '' }}
                    </div>
                </div>
            </div>
        @empty
            Nothing
        @endforelse

        {{ $events->links() }}
    </div>
@endsection
