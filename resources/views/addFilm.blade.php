@extends('layouts.app')

@section('content')

@if(isset($type))
<div class="container">
  @if($type == 1 || $type ==3)
    <form method="POST" style="width: 50%" action="{{route('saveDetFilm')}}">
    @csrf
    <div class="mb-3">
       <label class="form-label">Добавить Режиссера</label>
       <input type="text" name="director" class="form-control" aria-describedby="Название">
     </div>
    <div class="mb-3">
       <label class="form-label">Продолжительность фильма</label>
       <input type="text" name="duration" class="form-control" aria-describedby="Название">
     </div>
        <input type="hidden" name="film_id" value="{{$type}}">
      <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
  </form>
  @elseif($type == 2 || $type == 4 || $type ==5)
<form method="POST" style="width: 50%" action="{{route('saveDetSerials')}}">
    @csrf
    <div class="mb-3">
       <label class="form-label">Количество сезонов</label>
       <input type="text" name="season" class="form-control" aria-describedby="Название">
     </div>
    <div class="mb-3">
       <label class="form-label">Количестов серий</label>
       <input type="text" name="episodes" class="form-control" aria-describedby="Название">
     </div>
        <input type="hidden" name="film_id" value="{{$type}}">
      <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
  </form>
  @endif
</div>
@else
<div class="container">
  <form  method="POST"  action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
      <div class="mb-3 row g-3 align-items-center">
      <select name="category_id" class="form-select col-auto" style="width:25%;" aria-label="Default select example">
        <option selected>Выберете категорию</option>
        <option value="1">Кино</option>
        <option value="2">Сериал</option>
        <option value="3">Мультфильм</option>
        <option value="4">Мультсериал</option>
        <option value="5">Аниме</option>
      </select>

     <div class="mb-3">
       <label class="form-label">Название</label>
       <input type="text" name="title" class="form-control" aria-describedby="Название">
     </div>
     <div class="mb-3">
       <label class="form-label">Оригинальное название</label>
       <input type="text" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма">
     </div>
     <div class="mb-3">
       <label class="form-label">Дата Выхода</label>
       <input type="text" name="CreatDate" class="form-control" aria-describedby="12.06.2001">
     </div>
     <div class="mb-3">
       <label class="form-label">Описание</label>
       <textarea type="text" name="description" style="height: 300px" class="form-control"></textarea>
     </div>
     <div class="mb-3">
        <label class="form-label">Добавить изображение</label>
        <input type="file" class="form-control-file" name="image">
     </div>
       <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
     </div>
  </form>
@endif
</div>
@endsection