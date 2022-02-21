@extends('layouts.app')

@section('content')
<div class="container">
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="admin-display">
   <div class="left-admin-display-item">
      <div class="admin-display-item" style="position:relative; top:1px;" >
            <form action="{{route('admin')}}">
            <input type="hidden" name="nonedet" value="true">
            <button class="btn-dark admin-btn" type="submit">Контент без подробностей</button>   
            </form> 
      </div>
      <div class="admin-display-item">
            <form action="{{route('admin')}}">
            <button class="btn-dark admin-btn" type="submit">Поиск</button>
            <input class="admin-search" type="text" name="search" value="{{request()->search}}" placeholder="search">
            </form>
      </div>
   </div>
   <div class="right-admin-display-item" >
         <div class="admin-display-item">
            <a class="btn-dark admin-btn-link" href="{{route('addFilm')}}">Добавить контент</a>
         </div>
   </div>
</div>

<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">img</th>
      <th scope="col">Название</th>
      <th scope="col">Тип</th>
      <th scope="col">Подробности</th>
    </tr>
  </thead>
  <tbody>
   @foreach($films as $film)
    <tr>
      <th><a href="{{route('show',$film->id)}}"><img style="width:50px;" src="{{Storage::url('image/films/'.$film->image) }}"></a></th>
      <th scope="row"><a class="show-link" href="{{route('show',$film->id)}}">{{$film->title}}</a> 
         <form action="{{route('edit',$film->id)}}">
         <button type="submit" style="margin: -14px" class="btn btn-link">Изменить</button>
         </form>
         <a href="{{route('delete',$film->id)}}" class="btn btn-link" style="color: red; margin: -14px">
          Удалить
         </a>
      </th>
      <!-- Вторая колонка -->
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
    </tr>
   @endforeach
  </tbody>
</table>
   <div style="display: flex; justify-content: center;">
      {{ $films->links() }}
   </div> 
</div>
@endsection