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
			   		<p>Дата Выхода: {{\Carbon\Carbon::parse($kino->Premiere_date)->locale('ru')->isoFormat('D MMMM Y')}}</p>

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
	<div style="display:flex;">
	 <form action="{{route('SaveFavorite')}}">
		@csrf
		<input type="hidden" name="film_id" value='{{$kino->id}}'>
		<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
		<input type="hidden" name="slug" value="{{Auth::user()->id}}{{$kino->id}}">
		<button type="submit" class="btn btn-secondary mt-3">Смотреть позже</button>
	</form>

	<form style="margin-left:15px" action="{{route('saveWatched')}}">
		@csrf
		<input type="hidden" name="slug" value="{{Auth::user()->id}}{{$kino->id}}">
		<input type="hidden" name="category_id" value="{{$kino->category_id}}">
		<input type="hidden" name="film_id" value='{{$kino->id}}'>
		<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
		<button type="submit" class="btn btn-secondary mt-3">Просмотренно</button>
	</form>
 </div>


	<hr>
</div>

<!-- Секция коментариев -->
<div class="container">
	<h3>Секция Комментариев</h3>
	@guest
			<p>Войдите что-бы оставить коментарий</p>
	@else
<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Составить своё мнение
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавление комментария</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  			<form id="comment" method="POST" action="{{route('saveComment')}}">
	  				@csrf
	  				<input value="{{$kino->id}}" type="hidden" name="film_id">
	  				<input value="{{Auth::user()->id}}" type="hidden" name="user_id">
	  				<textarea name="text" class="card-text form-control mb-1" style="width: 100%;margin-bottom: -20px;"></textarea>
	  			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" form="comment" class="btn btn-secondary">Оставить комментарий</button>
      </div>
    </div>
  </div>
</div>
  <!-- Остaвить коментарий -->

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