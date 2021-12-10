@extends('layouts.app')

@section('content')

 @foreach($kino as $kino)
 	<div class="container show-container">
 		<div class="show-head">
			<img class="show-img" src="{{ Storage::url('image/films/'.$kino->image) }}" alt="Photo">
			<div class="show-text">
		   		<h1 class="main-title show-title">{{$kino->title}}</h1>
		   		<h4 class="show-orig-title">{{$kino->OrigTitle}}</h4>
		   		<p>Режиссер: {{$kino->Director}}</p>
		   		<p>Дата Выхода: {{$kino->CreatDate}}</p>
		   		<p>Длительность фильма: {{$kino->Duration}} минут</p>
		   	</div>
		</div>
		<hr>
			<div class="show-descrption">
	   			<p class="main-description">{{$kino->description}}</p>
	   		</div>
	   	<hr>
   	</div>
 @endforeach


@endsection