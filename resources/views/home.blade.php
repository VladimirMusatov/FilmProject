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
                        <p>Просмотрено фильмов</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>46</h3>
                        <p>Просмотрено серий сериалов</p>           
                    </div>
                    <div class="home-center-card">
                        <h3>17</h3>
                        <p>Просмотрено серий аниме</p>           
                    </div>
                    </div> 
                    <hr style="width: 90%; margin:0 auto;">  
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
