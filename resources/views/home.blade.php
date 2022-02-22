@extends('layouts.app')

@section('content')

@foreach($users as $user)

    <div class="home-body">
        <div class="container">
            <div class="home-main-section">
                <div class="home-center-section"> 
                    <div class="home-statistic">
                     <div class="home-center-card">
                        <h3>{{$statistics->countFilm}}</h3>
                        <p>Фильмов просмотренно</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>{{$statistics->countSerials}}</h3>
                        <p>Сериалов просмотренно</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>{{$statistics->countAnime}}</h3>
                        <p>Аниме просмотренно</p>           
                    </div>
                    </div> 
                    <hr style="width: 90%; margin:0 auto 15px;">
                    <div class="home-favorite">
                        <div class="home-favorite-container">
                                <h3>Избранное</h3>
                                <hr>
                            @foreach($favorites as $favorite)
                            <div class="home-favorite-item row justify-content-between">
                                <div class="home-favorite-item-left col">
                                <div class="home-favorite-img"><img src="{{Storage::url('public/image/icon/')}}icon.jpg" class="home-favorite-icon"></div>
                                <div class="home-favorite-text">
                                    <div class="home-favorite-text-title"><a class="home-favorite-text-link" href="{{route('show',$favorite->film->id)}}">{{$favorite->film->title}}</a></div>
                                    <div class="home-favorite-text-orig_title">{{$favorite->film->OrigTitle}}</div>
                                </div>
                                </div>
                                @if($user->id ==  Auth::user()->id)
                                <div class="home-favorite-item-right col">
                                    <a href="{{route('deleteFavorite',$favorite->id)}}" class="home-favorite-buttom-delete home-favorite-btn">Убрать</a>
                                    <form action="{{route('saveWatched')}}">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{$favorite->film->category_id}}">
                                        <input type="hidden" name="film_id" value="{{$favorite->film->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="slug" value="{{Auth::user()->id}}{{$favorite->film->id}}">
                                        <button type="submit"  class="home-favorite-buttom-delete home-favorite-btn btn btn-link">Просмотренно</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="home-watched">
                        <div class="home-watched-container">
                            <hr>
                            <h3>Просмотренно</h3>
                            <hr>
                            @foreach($watched as $watched)
                            <div class="home-favorite-item row justify-content-between">
                                <div class="home-favorite-item-left col">
                                <div class="home-favorite-img"><img src="{{Storage::url('public/image/icon/')}}icon.jpg" class="home-favorite-icon"></div>
                                <div class="home-favorite-text">
                                    <div class="home-favorite-text-title"><a class="home-favorite-text-link" href="{{route('show',$watched->film->id)}}">{{$watched->film->title}}</a></div>
                                    <div class="home-favorite-text-orig_title">{{$watched->film->OrigTitle}}</div>
                                </div>
                                </div>
                                @if($user->id ==  Auth::user()->id)
                                <div class="home-favorite-item-right col">
                                    <a href="{{route('deleteWatched',$watched->id)}}" class="home-favorite-buttom-delete home-favorite-btn">Убрать</a>
                                </div>
                                @endif
                            </div>
                           @endforeach
                        </div>
                    </div>

                </div>
                <div class="home-right-section">
                    <div class="home-person-block">
                        @if(($user->detail_user->back_img) == 'Rectangle 3.png')
                        <img class="home-person-back_img" src="{{Storage::url('public/image/example/')}}Rectangle 3.png">
                        @else
                        <img class="home-person-back_img" src="{{Storage::url('public/image/home/'.$user->id.'/'.$user->detail_user->back_img)}}">
                        @endif
                            <div class="person-icon-bloc">
                              @if(($user->detail_user->user_img) == 'images.jfif')
                                <img class="person-icon" src="{{Storage::url('public/image/example/').'images.jfif'}}">
                              @else  
                                <img class="person-icon" src="{{Storage::url('public/image/home/'.$user->id.'/'.$user->detail_user->user_img)}}">
                              @endif  
                            </div>

                        <div class="person-text">
                            <h3>{{$user->name}}</h3>
                            <p class="person-description">{{$user->detail_user->description}}</p>
                        </div>
                    </div>
                @if($user->id ==  Auth::user()->id)
                 <a href="{{route('edit_user',$user->id)}}" class="btn catalog-btn home-btn">Редактировать профиль</a>
                @endif

                    <div class="person-recomend">
                        <div class="person-recomend-header">
                            <p>Избранное</p>
                            @if($user->id ==  Auth::user()->id)
                            <p><a href="#">Изменить список</a></p>
                            @endif
                        </div>
                        <hr style="width:90%; margin: 0 auto;">
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
