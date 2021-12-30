@extends('layouts.app')

@section('content')
<div class="container">
@foreach($film as $film)

    @if ($errors->any())
      <div class="alert alert-danger" style="width:50%; margin: 0 auto;">
        <ul>
          @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

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
         <input type="date" name="Premiere_date" value="{{$film->Premiere_date}}" class="form-control" aria-describedby="12.06.2001">
       </div>
       <div class="mb-3">
         <label class="form-label">Описание</label>
         <textarea type="text" name="description" style="height: 300px" class="form-control" placeholder="{{$film->description}}" required>{{$film->description}}</textarea>
       </div>
       <div class="mb-3">
          <label class="form-label">Добавить изображение</label>
          <input type="file" class="form-control-file" value="{{$film->image}}" name="image">
       </div>
        <div>
          <label class="form-label">Ссылка на источник</label>
          <input type="text" value="{{$film->link}}" name="link" class="form-control" aria-describedby="Название"> 
        </div>
       @if($film->category_id == 1 || $film->category_id == 3)
       <div class="mb-3">
         <label class="form-label">Режиссер</label>
         <input type="text" name="director" @if(isset($film->DetFilm->director)) value="{{$film->DetFilm->director}}" @endif class="form-control">
       </div>
       <div class="mb-3">
         <label class="form-label">Продолжительность</label>
         <input type="text" name="duration" @if(isset($film->DetFilm->duration)) value="{{$film->DetFilm->duration}}" @endif class="form-control">
       </div>
       @else
       <div class="mb-3">
         <label class="form-label">Количесвто серий</label>
         <input type="text" name="episodes" @if(isset($film->DetSerial->episodes)) value="{{$film->DetSerial->episodes}}" @endif class="form-control">
       </div>
       <div class="mb-3">
         <label class="form-label">Количесвто сезонов</label>
         <input type="text" name="season" @if(isset($film->DetSerial->season)) value="{{$film->DetSerial->season}}" @endif class="form-control">
       </div>
       @endif
         <button class="btn btn-warning mt-3 col-auto" type="submit">Изменить</button>

    </form>
@endforeach
</div>
@endsection