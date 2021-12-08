@extends('layouts.app')

@section('content')
<div class="container">
   
<div class="container">

 <div class="catalog-filtr">
   <form action="{{route('catalog')}}">
      <input type="text" name="search" placeholder="search">
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
 </div>

   <hr>
   @foreach($film as $film)
  <div class="catalog-item mb-5">
      <div class="catalog-img">
         <img class="catalog-image" src="{{ Storage::url('image/films/'.$film->image) }}" alt="Photo">
      </div>
      <div class="catalog-text">
         <h1><a class="catalog-link" href="{{route('show',$film->id)}}">{{$film->title}}</a></h1>
         <p>{{$film->description}}</p>
      </div>
  </div>
  <hr class="mb-3">
  @endforeach
</div>

</div>
@endsection
