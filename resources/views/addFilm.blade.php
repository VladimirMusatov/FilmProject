@extends('layouts.app')

@section('content')

<div class="container">
   <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
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
</div>
@endsection