@extends('layouts.app')

@section('content')
    <section class="section-top" id="home-top">
    	<div class="container">
    		<h1>Polis Parallèle <br> France</h1>

	        <h2 class="h3">Lorem ipsum dolor sit amet, consectetur adipisquisquam.</h2>
    	</div>
    </section>

    <section id="section-about">
        <div class="container text-center">
            <h3 class="my-4">A propos</h3>
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

    <section id="section-calendar">
    	<div class="container">
    		<h3>Communauté</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero dolorem ipsam iusto sapiente est aliquam ipsa nam placeat eveniet, nobis, debitis consequatur. Recusandae, distinctio, dolor? Praesentium quas nobis temporibus, eos.</p>

    		<h3>Technologie</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero dolorem ipsam iusto sapiente est aliquam ipsa nam placeat eveniet, nobis, debitis consequatur. Recusandae, distinctio, dolor? Praesentium quas nobis temporibus, eos.</p>

    		<h3>Crypto-anarchisme</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero dolorem ipsam iusto sapiente est aliquam ipsa nam placeat eveniet, nobis, debitis consequatur. Recusandae, distinctio, dolor? Praesentium quas nobis temporibus, eos.</p>
    	</div>
    </section>

    <section id="section-blog">
    	<div class="container">
    		<h3>Blog</h3>
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
    	</div>
    </section>
@endsection
