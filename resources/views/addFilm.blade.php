@extends('layouts.app')

@section('content')

<div class="container">

   <form  method="POST" style="width: 50%; margin:  0 auto;" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
        <div class="mb-3 row g-3 align-items-center">
        <select name="category_id" class="form-select col-auto" style=" width:  50%;" aria-label="Default select example" required>
          <option>Выберете категорию</option>
          <option value="1">Кино</option>
          <option value="2">Сериал</option>
          <option value="3">Мультфильм</option>
          <option value="4">Мультсериал</option>
          <option value="5">Аниме</option>
        </select>

       <div class="mb-3">
         <label class="form-label">Название</label>
         <input type="text" name="title" class="form-control" aria-describedby="Название" required>
       </div>
       <div class="mb-3">
         <label class="form-label">Оригинальное название</label>
         <input type="text" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма"
         required>
       </div>
       <div class="mb-3">
         <label class="form-label">Дата Выхода</label>
         <input type="text" name="CreatDate" class="form-control" aria-describedby="12.06.2001" required>
       </div>
       <div class="mb-3">
         <label class="form-label">Описание</label>
         <textarea type="text" name="description" style="height: 300px" class="form-control" required></textarea>
       </div>
       <div class="mb-3">
          <label class="form-label">Добавить изображение</label>
          <input type="file" class="form-control-file" name="image" required>
       </div>
        <div>
          <label class="form-label">Ссылка на источник</label>
          <input type="text" name="link" class="form-control" aria-describedby="Ссылка на источник" required> 
        </div>
         <button class="btn btn-secondary  col-auto" type="submit">Добавить</button>
       </div>
    </form>

</div>
@endsection