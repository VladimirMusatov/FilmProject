@extends('layouts.app')

@section('content')

<div class="container">

@foreach($film as $film)
	@if($film->category_id == 1 || $film->category_id == 3)
	<form method="POST" style="width: 50%; margin: 0 auto;" action="{{route('saveDetFilm')}}">
      @csrf
        <div class="mb-3">
         	<label class="form-label">Добавить Режиссера</label>
         	<input type="text" name="director" class="form-control" aria-describedby="Название">
        </div>
     	<div class="mb-3">
         	<label class="form-label">Продолжительность фильма</label>
         	<input type="text" name="duration" class="form-control" aria-describedby="Название">
        </div>
            <input type="hidden" name="status" value="1">
          	<input type="hidden" name="film_id" value="{{$film->id}}">
        <button class="btn btn-secondary mt-3 col-auto" type="submit">Добавить</button>
    </form>
	@else
    <form method="POST" style="width: 50%; margin: 0 auto;" action="{{route('saveDetSerials')}}">
      @csrf
      <div class="mb-3">
         <label class="form-label">Количество сезонов</label>
         <input type="text" name="season" class="form-control" aria-describedby="Название">
       </div>
      <div class="mb-3">
         <label class="form-label">Количестов серий</label>
         <input type="text" name="episodes" class="form-control" aria-describedby="Название">
       </div>
          <input type="hidden" name="status" value="1">
          <input type="hidden" name="film_id" value="{{$film->id}}">
        <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
    </form>
	@endif
@endforeach

</div>

@endsection