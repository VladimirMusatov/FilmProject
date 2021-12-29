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
			   		<p>Количество просмотров: {{$kino->view_count}}</p>
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

<div class=" container">
	<div class="row">
	<iframe  src="{{$kino->link}}" width="700" height="520"  frameborder="0" allowfullscreen></iframe>
	</div>
	<hr>
</div>

<!-- Секция коментариев -->
<div class="container">
	<h3>Секция Комментариев</h3>
	@guest
			<p>Войдите что-бы оставить коментарий</p>
	@else
  <!-- Остaвить коментарий -->
	  			<form method="POST" action="{{route('saveComment')}}">
	  				@csrf
	  				<input value="{{$kino->id}}" type="hidden" name="film_id">
	  				<input value="{{Auth::user()->id}}" type="hidden" name="user_id">
	  				<textarea name="text" class="card-text form-control mb-1" style="width: 100%;margin-bottom: -20px;"></textarea>
	  				<button type="submit" class="btn btn-secondary mt-3">Составить своё мнение</button>
	  			</form>
	@endguest
<hr>	
  <!-- Вывод коментариев -->
  @foreach($kino->comment as $comment)
	   <div class="card mt-3" style="width: 80%">
  <div class="card-header" style="display: flex; justify-content:space-between;">
  	    <p class="card-subtitle text-muted">{{$comment->user->name}}</p>
  	    <p class="card-subtitle text-muted">{{\Carbon\Carbon::parse($comment->created_at)->locale('ru')->isoFormat('Do MMMM в H:mm')}}</p>
  </div>
  <div class="card-body">
    <p style="margin-left: 15px" class="card-text">{{$comment->text}}</p>
  </div>
</div>
  @endforeach	
</div>
	
</div>
 @endforeach
@endsection