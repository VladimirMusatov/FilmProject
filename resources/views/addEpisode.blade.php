@extends('layouts.app')

@section('content')

@foreach($film as $film)
<div class="container">

	<form method="POST" style="width: 50%" action="{{route('saveEpisode')}}">
  		  @csrf
    		<div class="mb-3">
       			<label class="form-label">Название серии</label>
       			<input type="text" name="title" class="form-control" aria-describedby="Название серии">
    		 </div>
    		 <div class="mb-3">
       			<label class="form-label">Номер сезона</label>
       			<input type="text" name="season" class="form-control" aria-describedby="Номер сезона">
     		</div>
    		<div class="mb-3">
     		  	<label class="form-label">Номер серии</label>
      		 	<input type="text" name="episode" class="form-control" aria-describedby="Номер серии">
     		</div>
  			<div class="mb-3">
       		 	<label class="form-label">Ссылка на источник</label>
      		 	<input type="text" name="link" class="form-control" aria-describedby="Ссылка на источник">
     		</div>
    		<div class="mb-3">
     	    	 <label class="form-label">Продолжительность серии</label>
      		 	<input type="text" name="time" class="form-control" aria-describedby="Продолжительность серии">
     		</div>
       			<input type="hidden" name="film_id" value="{{$film->id}}">
     		 <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
  			</form>
</div>
@endforeach
@endsection