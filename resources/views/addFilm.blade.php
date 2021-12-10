@extends('layouts.app')

@section('content')

<div class="container">

  <form action="{{route('addFilm')}}">
      <div class="mb-3 row g-3 align-items-center">
      <select name="type" class="form-select col-auto" style="width:25%;" aria-label="Default select example">
        <option selected>Выберете категорию</option>
        <option value="1">Кино</option>
        <option value="2">Сериал</option>
        <option value="3">Мультфильм</option>
        <option value="4">Мультсериал</option>
        <option value="5">Аниме</option>
      </select>
       <button class="btn btn-secondary  col-auto" type="submit">Выбрать тип</button>
     </div>
  </form>

  @if($type == 1 ||$type == 3)
       <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 form-check form-check-inline">
        <input class="form-check-input" name="category_id" type="checkbox" id="inlineCheckbox1" value="1">
        <label class="form-check-label" for="inlineCheckbox1">Кино</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" name="category_id" type="checkbox" id="inlineCheckbox2" value="3">
        <label class="form-check-label" for="inlineCheckbox2">Мультфильм</label>
      </div>

     <div class="mb-3">
       <label class="form-label">Название фильма</label>
       <input type="text" name="title" class="form-control" aria-describedby="Название фильма">
     </div>
     <div class="mb-3">
       <label class="form-label">Оригинальное название фильма</label>
       <input type="text" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма">
     </div>
     <div class="mb-3">
       <label class="form-label">Режиссер</label>
       <input type="text" name="Director" class="form-control" aria-describedby="Режиссер">
     </div>
     <div class="mb-3">
       <label class="form-label">Длительноть фильма в минутах</label>
       <input type="text" name="Duration" class="form-control" aria-describedby="Длительность фильма">
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
     <button type="submit" class="btn btn-secondary">Добавить фильм</button>
   </form>
  @elseif($type == 2 || $type == 4 || $type == 5)
     <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 form-check form-check-inline">
        <input class="form-check-input" name="category_id" type="checkbox" id="inlineCheckbox1" value="2">
        <label class="form-check-label" for="inlineCheckbox1">Сериал</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" name="category_id" type="checkbox" id="inlineCheckbox2" value="4">
        <label class="form-check-label" for="inlineCheckbox2">Мультсериал</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" name="category_id" type="checkbox" id="inlineCheckbox2" value="5">
        <label class="form-check-label" for="inlineCheckbox2">Аниме</label>
      </div>

     <div class="mb-3">
       <label class="form-label">Название</label>
       <input type="text" name="title" class="form-control" aria-describedby="Название фильма">
     </div>
     <div class="mb-3">
       <label class="form-label">Оригинальное название</label>
       <input type="text" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма">
     </div>
     <div class="mb-3">
       <label class="form-label">Количесвто сезонов</label>
       <input type="text" name="seasons" class="form-control" aria-describedby="Количесвто сезонов">
     </div>
     <div class="mb-3">
       <label class="form-label">Количесвто серий</label>
       <input type="text" name="episodes" class="form-control" aria-describedby="Количесвто серий">
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
     <button type="submit" class="btn btn-secondary">Добавить</button>
   </form>
  @endif


</div>
@endsection