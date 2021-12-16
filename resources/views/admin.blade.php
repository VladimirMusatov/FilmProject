@extends('layouts.app')

@section('content')
<div class="container">

<div class="admin-display row">
   <div class="col">
      <a class="btn btn-dark admin-btn" href="{{route('addFilm')}}">Добавить</a>
   </div>
   <div class="col">

   <form action="{{route('addEpisode')}}" style="width: 350px;">
      <select name="Film" class="form-select" aria-label="Default select example">
       <option selected>Выберете к чему вы хотете добавить серию</option>
       @foreach($films as $film)
       <option value="{{$film->id}}">{{$film->title}}</option>
       @endforeach
      </select>
      <button type="submit" class="btn btn-dark mt-3">Добавить серию</button>
      </form>
   </div>


   <div class="col">
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

</div>
@endsection
