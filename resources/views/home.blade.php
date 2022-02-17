@extends('layouts.app')

@section('content')

@foreach($users as $user)
    <div class="home-body">
        <div class="container">
            <div class="home-main-section">
                <div class="home-center-section"> 
                    <div class="home-statistic">
                     <div class="home-center-card">
                        <h3>15</h3>
                        <p>Фильмов просмотренно</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>46</h3>
                        <p>Сериалов просмотренно</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>17</h3>
                        <p>Аниме просмотренно</p>           
                    </div>
                    </div> 
                    <hr style="width: 90%; margin:0 auto 15px;">
                    <div class="home-favorite">
                        <div class="home-favorite-container">
                            @foreach($favorites as $favorite)
                            <div class="home-favorite-item row justify-content-between">

                                <div class="home-favorite-item-left col">
                                <div class="home-favorite-img"><img src="{{Storage::url('public/image/icon/')}}icon.jpg" class="home-favorite-icon"></div>
                                <div class="home-favorite-text">
                                    <div class="home-favorite-text-title"><a class="home-favorite-text-link" href="{{route('show',$favorite->film->id)}}">{{$favorite->film->title}}</a></div>
                                    <div class="home-favorite-text-orig_title">{{$favorite->film->OrigTitle}}</div>
                                </div>
                                </div>

                                <div class="home-favorite-item-right col">
                                    <button class="home-favorite-buttom-delete home-favorite-btn">Убрать</button>
                                   <button  class="home-favorite-buttom-delete home-favorite-btn">Просмотренно</button>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="home-right-section">
                    <div class="home-person-block">
                        @if(($user->detail_user->back_img) == 'Rectangle 3.png')
                        <img class="home-person-back_img" src="{{Storage::url('public/image/home/')}}Rectangle 3.png">
                        @else
                        <img class="home-person-back_img" src="{{Storage::url('public/image/home/'.$user->id.'/'.$user->detail_user->back_img)}}">
                        @endif
                            <div class="person-icon-bloc">
                              @if(($user->detail_user->user_img) == 'images.jfif')
                                <img class="person-icon" src="{{Storage::url('public/image/home/').'images.jfif'}}">
                              @else  
                                <img class="person-icon" src="{{Storage::url('public/image/home/'.$user->id.'/'.$user->detail_user->user_img)}}">
                              @endif  
                            </div>

                        <div class="person-text">
                            <h3>{{$user->name}}</h3>
                            <p class="person-description">{{$user->detail_user->description}}</p>
                        </div>
                    </div>
                 <a href="{{route('edit_user',$user->id)}}" class="btn catalog-btn home-btn">Редактировать профиль</a>

                    <div class="person-recomend">
                        <div class="person-recomend-header">
                            <p>Избранное</p>
                            <p><a href="#">Изменить список</a></p>
                        </div>
                        <hr style="width:90%; margin: 0 auto;">
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
