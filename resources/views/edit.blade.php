@extends('layouts.app')

@section('content')
<div class="container">
@foreach($film as $film)
   <form  method="POST" style="margin: 0 auto; width: 50%"  action="{{route('update')}}" enctype="multipart/form-data">
      @csrf
       <div class="mb-3">
         <input type="hidden" name="id" value="{{$film->id}}" >
          <input type="hidden" name="category_id" value="{{$film->category_id}}">
          <input type="hidden" name="film_id" value="{{$film->id}}">
       </div>

       <div class="mb-3">
         <label class="form-label">Название</label>
         <input type="text" value="{{$film->title}}" name="title" class="form-control" placeholder="{{$film->title}}" aria-describedby="Название">
       </div>
       <div class="mb-3">
         <label class="form-label">Оригинальное название</label>
         <input type="text" value="{{$film->OrigTitle}}" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма" placeholder="{{$film->OrigTitle}}">
       </div>
       <div class="mb-3">
         <label class="form-label">Дата Выхода</label>
         <input type="text"  value="{{$film->CreatDate}}" name="CreatDate" class="form-control" aria-describedby="12.06.2001" placeholder="{{$film->CreatDate}}">
       </div>
       <div class="mb-3">
         <label class="form-label">Описание</label>
         <textarea type="text" name="description" style="height: 300px" class="form-control" placeholder="{{$film->description}}" required>{{$film->description}}</textarea>
       </div>
       <div class="mb-3">
          <label class="form-label">Добавить изображение</label>
          <input type="file" class="form-control-file" name="image">
       </div>
        <div>
          <label class="form-label">Ссылка на источник</label>
          <input type="text" value="{{$film->link}}" name="link" class="form-control" aria-describedby="Название"> 
        </div>
       @if($film->category_id == 1 || $film->category_id == 3)
       <div class="mb-3">
         <label class="form-label">Режиссер</label>
         <input type="text" name="director" class="form-control" required>
       </div>
       <div class="mb-3">
         <label class="form-label">Продолжительность</label>
         <input type="text" name="duration" class="form-control" required>
       </div>
       @else
       <div class="mb-3">
         <label class="form-label">Количесвто серий</label>
         <input type="text" name="episodes" class="form-control" required>
       </div>
       <div class="mb-3">
         <label class="form-label">Количесвто сезонов</label>
         <input type="text" name="season" class="form-control"  required>
       </div>
       @endif
         <button class="btn btn-warning mt-3 col-auto" type="submit">Изменить</button>

    </form>
@endforeach
</div>
@endsection