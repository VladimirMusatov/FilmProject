@extends('layouts.app')

@section('content')
<div class="container">

<div class="admin-display">
   <a class="btn btn-dark admin-btn" href="{{route('addFilm')}}">Добавить</a>

<form action="{{route('addFilm')}}" style="width: 350px;">   
   <select name="Film" class="form-select" aria-label="Default select example">
     <option selected>Выберете изменяемый элемент</option>
     @foreach($films as $film)
     <option value="{{$film->id}}">{{$film->title}}</option>
     @endforeach
   </select>
   <button type="submit" class="btn btn-dark mt-3">Добавить подробности</button>
</form>
</div>

</div>
@endsection
