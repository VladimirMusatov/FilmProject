@extends('layouts.app')

@section('content')
<div class="container">

<div class="admin-display row">
   <div class="col">
      <a class="btn btn-dark admin-btn" href="{{route('addFilm')}}">Добавить</a>
   </div>
</div>

<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Название</th>
      <th scope="col">Тип</th>
      <th scope="col">Подробности</th>
      <th scope="col">Изменить</th>
    </tr>
  </thead>
  <tbody>
   @foreach($films as $film)
    <tr>
      <th scope="row"><a class="show-link" href="{{route('show',$film->id)}}">{{$film->title}}<br>
      <div style="color: silver;">{{$film->OrigTitle}}</div>
      </a></th>
      <td >{{$film->category->title}} <br>
      <div style="color: silver;">{{$film->category->slug}}</div>
      </td>
      <!-- Подробности -->
      <td>
         <div class="col">
            @if($film->status == 0)
            <a class="btn btn-dark" href="{{route('addDet',$film->id)}}">Добавить подробности</a>
            @else 
               Все подробности добавленны
            @endif
         </div>
      </td>
      <td>
         <form action="{{route('edit',$film->id)}}">
         <button type="submit" class="btn btn-warning">Изменить</button>
         </form>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>

</div>
@endsection

