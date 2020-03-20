<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.head')
</head>
<body>
    <div id="app">
        @include('layouts.includes.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        @include('layouts.includes.footer')
    </footer>
</body>
</html>
