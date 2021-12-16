@extends('layouts.app')

@section('content')

 @foreach($kino as $kino)
 	<div class="container show-container">
 		<div class="show-head">
			<img class="show-img" src="{{ Storage::url('image/films/'.$kino->image) }}" alt="Photo">
			<div class="show-text">
		   		<h1 class="main-title show-title">{{$kino->title}}</h1>
		   		<h4 class="show-orig-title">{{$kino->OrigTitle}}</h4>
		   		<p>Тип: {{$kino->category->title}}</p>
		   		@if(($kino->category->id) == 1 ||($kino->category->id) == 3 )
		   		<p>Режиссер: {{$kino->DetFilm->director}}</p>
		   		<p>Длительность: {{$kino->DetFilm->duration}} минут</p>
		   		@else
		   		<p>Количество серий: {{$kino->DetSerial->episodes}} </p>
		   		<p>Количество сезонов: {{$kino->DetSerial->season}}</p>
		   		@endif
		   		<p>Дата Выхода: {{$kino->CreatDate}}</p>

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