@extends('layouts.app')

@section('content')
    <section class="section-top" id="home-top">
    	<div class="container">
    		<h1>Polis Parallèle <br> France</h1>

	        <h2 class="h3">Crypto Anarchisme - Bitcoin - Texte</h2>
    	</div>
    </section>

    <section id="section-about">
        <div class="container text-center">
            <h3 class="section-title">A propos</h3>
            <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur animi tempora qui <br> quos, cumque quod dolorum illo, iure placeat? Corporis asperiores quaerat magnam unde !</p>
            <div class="row">
            	<div class="col-md-4">
            		<div class="card">
            			<div class="card-body">
            				<i class="fas fa-users"></i>
            				<h4>Communauté</h4>
            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab?</p>
            			</div>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="card">
            			<div class="card-body">
            				<i class="fab fa-codepen"></i>
            				<h4>Technologie</h4>
            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab?</p>
            			</div>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="card">
            			<div class="card-body">
            				<i class="fab fa-bitcoin"></i>
            				<h4>Crypto-anarchisme</h4>
            				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab?</p>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </section>

    <section id="section-bg1">

    </section>

    <section id="section-blog">
    	<div class="container">
    		<h3 class="section-title">Blog</h3>
    		<div class="row">
    			@forelse ($posts as $post)
    			<div class="col-md-4">
    				<div class="card">
    					<div class="card-body">
    						<h4><a href="">{{ $post->title ?? '' }}</a></h4>
    						<p>{{ $post->preview ?? '' }}</p>
    						<a href="" class="btn btn-primary">Voir plus</a>
    					</div>
    				</div>
    			</div>
    			@empty
					<div class="col">
						Pas d'article actuellement.
					</div>
    			@endforelse
    		</div>
    		<div class="my-4 text-center">
    			<a href="{{ action('Front\BlogController@index') }}" class="btn btn-primary btn-lg">Tous nos articles</a>
    		</div>
    	</div>
    </section>

    <section id="section-podcasts">
    	<div class="container">
    		<h3 class="section-title">Podcasts</h3>
    		<div class="row">
    			@forelse ($podcasts as $podcast)
    			<div class="col-md-4">
    				<div class="card">
    					<div class="card-body">
    						<h4><a href="">{{ $podcast->title ?? '' }}</a></h4>
    						<a href="" class="btn btn-primary">Voir plus</a>
    					</div>
    				</div>
    			</div>
    			@empty
					<div class="col">
						Pas de podcasts actuellement.
					</div>
    			@endforelse
    		</div>
    		<div class="my-4 text-center">
    			<a href="{{ action('Front\FrontController@podcasts') }}" class="btn btn-primary btn-lg">Tous nos podcasts</a>
    		</div>
    	</div>
    </section>

    <section id="section-events">
    	<div class="container">
    		<h3 class="section-title">Événements</h3>
    		<div class="row">
    			@forelse ($events as $event)
    			<div class="col-md-4">
    				<div class="card">
    					<div class="card-body">
    						<h4><a href="">{{ $post->title ?? '' }}</a></h4>
    						<p>{{ $post->preview ?? '' }}</p>
    						<a href="" class="btn btn-primary">Voir plus</a>
    					</div>
    				</div>
    			</div>
    			@empty
					<div class="col">
						Pas d'événements actuellement.
					</div>
    			@endforelse
    		</div>
    		<div class="my-4 text-center">
    			<a href="{{ action('Front\FrontController@podcasts') }}" class="btn btn-primary btn-lg">Tous nos podcasts</a>
    		</div>
    	</div>
    </section>

    <section>
    	<div class="container">
    		<h3 class="section-title">Support</h3>
    	</div>
    </section>
@endsection

<!-- 
<a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by freepik - www.freepik.com</a>
 -->