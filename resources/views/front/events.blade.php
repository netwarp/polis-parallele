@extends('layouts.app')

@section('content')
    <div class="section-top">
        <h1>Events</h1>
    </div>

    <div class="container">
        @for($i = 0; $i < 3; $i++)
            <div class="card my-4">
                <div class="card-header">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore?</h2>
                </div>
                <div class="card-body">
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloribus eaque hic inventore non obcaecati, odit perferendis, provident quas repellat reprehenderit tenetur voluptatum! Maiores nesciunt porro quis recusandae sapiente ullam?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, delectus dolor exercitationem iure labore, odio officiis possimus quaerat recusandae sapiente sit voluptate, voluptatum. Atque consectetur dolorem in necessitatibus, quam voluptatibus?</p>
                </div>
            </div>
        @endfor
    </div>
@endsection
