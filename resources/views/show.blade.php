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
		   		@if(isset($kino->DetFilm) || isset($kino->DetSerial))
		   			@if(($kino->category->id) == 1 ||($kino->category->id) == 3 )
		   			<p>Режиссер: {{$kino->DetFilm->director}}</p>
		   			<p>Длительность: {{$kino->DetFilm->duration}} минут</p>
		   			@else
		   			<p>Количество серий: {{$kino->DetSerial->episodes}} </p>
		   			<p>Количество сезонов: {{$kino->DetSerial->season}}</p>
		   			@endif
		   		@endif
		   		<p>Дата Выхода: {{$kino->CreatDate}}</p>
		   	</div>
		</div>
		<hr>
			<div class="show-descrption">
	   			<p class="main-description">{{$kino->description}}</p>
	   		</div>
	   	<hr>

	@if(($kino->category->id) == 2 ||($kino->category->id) == 4 ||($kino->category->id) == 5 )
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Название серии</th>
		    </tr>
		  </thead>
	@foreach($kino->episode as $kino)
		  <tbody>
		    <tr>
		      <th scope="row">
		      	<form action="{{route('show',$kino->film_id)}}">
		      		<input type="hidden" name="video" value="{{$kino->link}}">
		      		<button type="submit" class="btn show-link">{{$kino->title}}</button>
		      	</form>
		      </th>
		      <td>{{$kino->season}} сезон {{$kino->episode}} серия </td>
		    </tr>
		    <tr>
		  </tbody>
	@endforeach
		</table>
	@endif
	</div>
 @endforeach

<div class=" container">
	<div class="row">
		<video class="col" src="{{$link}}" poster="poster.jpg" controls></video>
	</div>
</div>

@endsection