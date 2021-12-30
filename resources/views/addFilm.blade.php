@extends('layouts.app')

@section('content')

<div class="container">
   <form class="mt-3"  method="POST" style="width: 50%; margin:  0 auto;" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf

    @if ($errors->any())
      <div class="alert alert-danger" >
        <ul>
          @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

        <div class="mb-3 mt-3 row g-0 align-items-center">
        <select name="category_id" class="form-select col-auto" style=" width:  50%;" aria-label="Default select example">
          <option>Выберете категорию</option>
          <option @if((old('category_id')) == 1)selected @endif value="1">Кино</option>
          <option @if((old('category_id')) == 2)selected @endif value="2">Сериал</option>
          <option @if((old('category_id')) == 3)selected @endif  value="3">Мультфильм</option>
          <option @if((old('category_id')) == 4)selected @endif  value="4">Мультсериал</option>
          <option @if((old('category_id')) == 5)selected @endif  value="5">Аниме</option>
        </select>
       </div>

       <div class="mb-3">
         <label class="form-label">Название</label>
         <input value="{{old('title')}}" type="text" name="title" class="form-control" aria-describedby="Название" >
       </div>
       <div class="mb-3">
         <label class="form-label">Оригинальное название</label>
         <input value="{{old('OrigTitle')}}" type="text" name="OrigTitle" class="form-control" aria-describedby="Оригинальное название фильма">
       </div>
       <div class="mb-3">
         <label class="form-label">Дата Выхода</label>
         <input type="date" value="{{old('Premiere_date')}}" name="Premiere_date" class="form-control" aria-describedby="12.06.2001">
       </div>
       <div class="mb-3">
         <label class="form-label">Описание</label>
         <textarea type="text" name="description" style="height: 300px" class="form-control">{{old('description')}}</textarea>
       </div>
       <div class="mb-3" style="display:flex; justify-content: center; align-content: center; flex-direction: column;">
          <label class="form-label">Добавить изображение</label>
          <input type="file" class="form-control-file" name="image">
       </div>
        <div>
          <label class="form-label">Ссылка на источник</label>
          <input  value="{{old('link')}}" type="text" name="link" class="form-control" aria-describedby="Ссылка на источник">
          <p style="font-size: 12px;">Источник можно получить на <a target="_blank" href="https://videocdn.tv/">VideoCDN</a></p>
        </div>
         <button class="btn btn-secondary mt-3 col-auto" type="submit">Добавить</button>
    </form>

</div>
@endsection