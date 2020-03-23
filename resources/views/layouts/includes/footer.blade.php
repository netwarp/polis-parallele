<footer>
    <div class="container">
        <div class="col">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ action('Front\FrontController@podcasts') }}">Podcasts</a></li>
                <li><a href="{{ action('Front\FrontController@events') }}">Events</a></li>
                <li><a href="{{ action('Front\FrontController@support') }}">Support</a></li>
                <li><a href="{{ action('Front\FrontController@contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
@stack('js')
