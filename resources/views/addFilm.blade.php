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