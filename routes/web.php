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

Route::redirect('/','/index');
Auth::routes();

//Общедоступные роуты
Route::get('/index',[HomeController::class,'index'])->name('index');
Route::get('/catalog',[HomeController::class,'catalog'])->name('catalog');
Route::get('/catalog/{slug}',[HomeController::class,'SortByCat'])->name('categories');
Route::get('/random',[HomeController::class,'random'])->name('random');
Route::get('/show/{id}',[HomeController::class,'show'])->name('show');


//Роуты доступные лишь зарегестрированным пользователям
Route::group(['middleware'=>['role:user|admin']],function(){

    Route::get('/home',[HomeController::class, 'home'])->name('home');

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
    Route::get('/addDet',[AdminController::class, 'addDet'])->name('addDet');
    //Сохранение фильма
    Route::post('/store',[AdminController::class, 'store'])->name('store');
    //Сохранение дополнительной информации о фильме
    Route::post('/saveDetFilm',[AdminController::class, 'saveDetFilm'])->name('saveDetFilm');
    //Сохранение дополнительной информации о сериале
    Route::post('/saveDetSerial',[AdminController::class,'saveDetSerial'])->name('saveDetSerials');
});
