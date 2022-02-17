@extends('layouts.app')

@section('content')

    <div class="home-body">
        <div class="container">
            <div class="edit_user-main-section">
                <div class="edit_user-center-section"> 
                    <div class="edit_user-statistic">
						<form id="update_user" action="{{route('update_user')}}" class="mt-3" method="POST" style="margin: 0 auto;" enctype="multipart/form-data">
							@csrf
								<h2>Изминение пользователя</h2>
								<hr>

							    @if ($errors->any())
							      <div class="alert alert-danger" >
							        <ul>
							          @foreach ($errors->all() as $error)
							                    <li>{{ $error }}</li>
							          @endforeach
							        </ul>
							      </div>
							    @endif

								<input type="hidden" name="user_id" value="{{$user->id}}">
								<label class="form-label">Имя профиля</label>
								<input class="form-control" type="text" name="name" value="{{$user->name}}">
								<label class="form-label mt-3">Редактровать фотографию</label>
								<input class="form-control" type="file" name="user_img">
								<label class="form-label mt-3">Редактровать задний фон профиля</label>
								<input class="form-control" type="file" name="back_img">
								<label class="form-label mt-3">О себе</label>
								<textarea name="description" class="form-control mb-3">{{$user->detail_user->description}}</textarea>
								<hr>
						</form>
                    </div>   
                </div>
                <div class="edit_user-right-section">
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
                    <button type="submit" form="update_user" class="btn catalog-btn home-btn">Сохранить изминения</button>
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