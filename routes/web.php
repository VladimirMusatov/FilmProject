<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/','/FilmProject');
Auth::routes();

//Общедоступные роуты
Route::get('/FilmProject',[HomeController::class,'index'])->name('index');
Route::get('/catalog',[HomeController::class,'catalog'])->name('catalog');
Route::get('/catalog/{slug}',[HomeController::class,'SortByCat'])->name('categories');
Route::get('/random',[HomeController::class,'random'])->name('random');
Route::get('/show/{id}',[HomeController::class,'show'])->name('show');
//Сохранение коментария
Route::post('/saveComment',[HomeController::class,'saveComment'])->name('saveComment');
//Редактирование пользователя
Route::get('/edit_user/{id}',[HomeController::class,'edit_user'])->name('edit_user');
Route::post('/update_user',[HomeController::class,'update_user'])->name('update_user');
//Подборки
Route::get('/collections',[HomeController::class,'collections'])->name('collections');

//Избранное
Route::get('/saveFavorite',[HomeController::class,'SaveFavorite'])->name('SaveFavorite');


//Роуты доступные лишь зарегестрированным пользователям
Route::group(['middleware'=>['role:user|admin']],function(){

Route::post('/home/{id}',[HomeController::class, 'home'])->name('home');

});

//Роуты доступные лишь админу
Route::group(['middleware' =>['role:admin']], function(){

    //Админ панели
    Route::get('/admin',[AdminController::class, 'admin'])->name('admin');
    //Добавления фильма
    Route::get('/addFilm',[AdminController::class, 'addFilm'])->name('addFilm');
    //Изминения фильма
    Route::get('/edit/{id}',[AdminController::class, 'edit'])->name('edit');
    //Добавление Подробностей
    Route::post('/update',[AdminController::class, 'update'])->name('update');
    Route::get('/addDet/{id}',[AdminController::class, 'addDet'])->name('addDet');
    //Сохранение фильма
    Route::post('/store',[AdminController::class, 'store'])->name('store');
    //Сохранение дополнительной информации о фильме
    Route::post('/saveDetFilm',[AdminController::class, 'saveDetFilm'])->name('saveDetFilm');
    //Сохранение дополнительной информации о сериале
    Route::post('/saveDetSerial',[AdminController::class,'saveDetSerial'])->name('saveDetSerials');
});
