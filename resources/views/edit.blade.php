@extends('layouts.app')

@section('content')
<div class="container">
@foreach($film as $film)
   <form  method="POST" style="margin: 0 auto; width: 50%"  action="{{route('update')}}" enctype="multipart/form-data">
      @csrf
       <div class="mb-3">
         <input type="hidden" name="id" value="{{$film->id}}" class="form-control">
       </div>
       <div class="mb-3">
         <input type="hidden" name="category_id" value="{{$film->category_id}}" class="form-control">
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
         <textarea type="text" name="description" style="height: 300px" class="form-control" placeholder="{{$film->description}}"></textarea>
       </div>
       <div class="mb-3">
          <label class="form-label">Добавить изображение</label>
          <input type="file" class="form-control-file" name="image">
       </div>
        <div>
          <label class="form-label">Ссылка на источник</label>
          <input type="text" value="{{$film->link}}" name="link" class="form-control" aria-describedby="Название"> 
        </div>
         <button class="btn btn-warning mt-3 col-auto" type="submit">Изменить</button>

    </form>
@endforeach
</div>
@endsection