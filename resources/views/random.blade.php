@extends('layouts.app')

@section('content')

 @foreach($film as $film)
 	<div class="container show-container">
 		<div class="show-head">
			<img class="show-img" src="{{ Storage::url('image/films/'.$film->image) }}" alt="Photo">
			<div class="show-text">
		   		<h1 class="main-title show-title">{{$film->title}}</h1>
		   		<h4 class="show-orig-title">{{$film->OrigTitle}}</h4>
		   		<p>Режиссер: {{$film->Director}}</p>
		   		<p>Дата Выхода: {{$film->CreatDate}}</p>
		   		<p>Длительность фильма: {{$film->Duration}} минут</p>
		   	</div>
		</div>
		<hr>
			<div class="show-descrption">
	   			<p class="main-description">{{$film->description}}</p>
	   		</div>
	   	<hr>
   	</div>
 @endforeach


@endsection