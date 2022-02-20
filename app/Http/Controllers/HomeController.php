<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Film;
use App\Models\User;
use App\Models\Detail_user;
use App\Models\Favorite;
use App\Models\Watched;
use App\Models\Statistics;

class HomeController extends Controller
{
    public function home($id)
    {   
        $user = User::where('id', $id)->get();

        $favorites = Favorite::where('user_id',$id)->paginate(3);

        $watched = Watched::where('user_id', $id)->get();

        $statistics = Statistics::where('user_id', $id)->first();

        return view('home',['users'=>$user , 'favorites' => $favorites, 'watched' => $watched, 'statistics' => $statistics, ]);
    }

    public function saveFavorite(Request $request)
    {
        Favorite::create($request->all());

        $id = $request->film_id;

        return redirect('/show/'.$id);
    }

    public function deleteFavorite($id)
    {
        Favorite::where('id',$id)->delete();

        return redirect()->back();
    }

    public function saveWatched(Request $request)
    {
        $data = $request->only('user_id', 'film_id');
        $user_id = $request->only('user_id');
        $category_id = $request->category_id;

        if($category_id == 1 || $category_id == 3 ){
            $count = Statistics::where('user_id', $user_id)->increment('countFilm');
        }
        if($category_id == 2 || $category_id == 4){
            $count = Statistics::where('user_id', $user_id)->increment('countSerials');
        }   
        if($category_id == 5){
            $count = Statistics::where('user_id', $user_id)->increment('countAnime');
        }

         Watched::create($data);
         return redirect()->back();
    }

    public function deleteWatched($id)
    {
        Watched::where('id',$id)->delete();

        return redirect()->back();
    }

    public function edit_user($id)
    {

        $user = User::where('id', $id)->first();

        return view('edit_user',['user'=>$user]); 
        
    }

    public function update_user(Request $request)
    {
        $validate = $request->validate([
                'name' => 'required',
                'user_img' => 'required',
                'back_img' => 'required', 
                'description' => 'required',
        ]);

        $data = $request->all();
        $user_id = $request->user_id;

        // Удаление старой фотографии
        $img = Detail_user::where('user_id',$request->user_id)->first('user_img');
        $back_img = Detail_user::where('user_id',$request->user_id)->first('back_img');
        $path = 'public/image/home/'.$user_id.'/'.$img['user_img'];
        $back_path = 'public/image/home/'.$user_id.'/'.$img['back_img'];
        $file = Storage::delete($path);
        $file = Storage::delete($back_path);

        //Сохранение новой фотографии
        $filename = $data['user_img']->getClientOriginalName();
        $data['user_img']->move(Storage::path('/public/image/').'home/'.$data['user_id'],$filename);
        $data['user_img'] = $filename;

        //Сохранение нового фона
        $filename1 = $data['back_img']->getClientOriginalName();
        $data['back_img']->move(Storage::path('/public/image/').'home/'.$data['user_id'],$filename1);
        $data['back_img'] = $filename1;

        User::where('id', $user_id)->update(['name'=>$data['name']]);
        Detail_user::where('user_id',$user_id)->update(['description'=>$data['description'],'user_img'=>$data['user_img'],'back_img'=>$data['back_img']]);

        $user = User::where('id', $user_id)->get();
        $favorites = Favorite::where('user_id', $user_id)->get();

        return redirect('home/'.$user_id);

    }

}