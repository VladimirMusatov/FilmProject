@extends('layouts.app')

@section('content')
<div class="container">
   
<div class="container">

 <div class="catalog-filtr">
   <form action="{{route('catalog')}}">
      <input type="text" name="search" value="{{request()->search}}" placeholder="search">
      <button class="btn catalog-btn" type="submit">Поиск</button>
   </form>
   <form action="{{route('catalog')}}">
      <input type="hidden" name="newrelease"> 
      <button class="btn catalog-btn" type="submit">Новинки</button>
   </form>
   <form action="{{route('catalog')}}">
      <input type="hidden" name="mostpopular">
      <button class="btn catalog-btn" type="submit">Самые популярные</button>
   </form>
   <a class="btn catalog-btn" href="{{route('catalog')}}">Сбросить фильтры</a> 
 </div>


   <hr>
   @foreach($films as $film)
  <div class="catalog-item mb-5">
      <div class="catalog-img">
         <a href="{{route('show',$film->title)}}"><img class="catalog-image" src="{{ Storage::url('image/films/'.$film->image) }}" alt="Photo"></a>
      </div>
      <div class="catalog-text">
         <h1 class="main-title"><a class="catalog-link" href="{{route('show',$film->title)}}">{{$film->title}}</a></h1>
            <a class="catalog-link" href="{{route('categories',$film->category['slug'])}}"><div class="catalog-category">{{$film->category['title']}}</div></a>
         <p>{{$film->description}}</p>
      </div>
  </div>
  <hr class="mb-3">
  @endforeach
</div>

</div>
@endsection
