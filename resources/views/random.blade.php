@extends('layouts.app')

@section('content')


 @foreach($film as $film)
 	<div class="container random-container">
 		<div class="random-head">
			<img class="random-img" src="{{ Storage::url('image/films/'.$film->image) }}" alt="Photo">
		   	<h1 class="main-title random-title">{{$film->title}}</h1>
		</div>
		<hr>
			<div class="random-descrption">
	   			<p class="main-description">{{$film->description}}</p>
	   		</div>
	   	<hr>
   	</div>
 @endforeach


@endsection