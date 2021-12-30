@extends('layouts.app')

@section('content')
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
                    <img src="{{Storage::url('public/image/home/')}}Rectangle 3.png">
                        <div class="person-icon-bloc">
                            <img class="person-icon" src="{{Storage::url('public/image/home/')}}images.jfif">
                        </div>

                    <div class="person-text">
                        <h3>{{Auth::user()->name}}</h3>
                        <p class="person-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
             <a href="#" class="btn catalog-btn home-btn">Редактировать профиль</a>

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

@endsection
