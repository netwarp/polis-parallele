<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.head')
</head>
<body>
<div id="app" class="admin-zone">
    @include('layouts.includes.nav')

    <main class="py-4">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar">
                    <ul>
                        <li><a href="{{ action('Admin\AdminController@index') }}">Home</a></li>
                        <li><a href="{{ action('Admin\PostsController@index') }}">Blog</a></li>
                        <li><a href="{{ action('Admin\PodcastsController@index') }}">Podcasts</a></li>
                        <li><a href="{{ action('Admin\EventsController@index') }}">Events</a></li>
                        <li><a href="{{ action('Admin\SupportController@index') }}">Support</a></li>
                        <li><a href="{{ action('Admin\ContactController@index') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                @yield('content')
            </div>
        </div>
    </main>
</div>
<footer>
    @include('layouts.includes.footer')
</footer>
@if (session('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success")
    </script>
@endif
</body>
</html>
