<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Events\PostHasViewed;
use App\Models\Film;
use App\Models\DetFilm;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Detail_user;
use App\Models\Favorite;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function home(Request $request)
    {   
        $user_id = $request->user_id;

        $user = User::where('id', $user_id)->get();

        $favorites = Favorite::where('user_id',$user_id)->paginate(3);

        return view('home',['users'=>$user , 'favorites' => $favorites]);
    }

    public function catalog(Request $request)
    {
        if(isset($request->mostpopular))
        {
            $films = Film::query()->orderBy('view_count' , 'desc')->paginate(4);
        }
        elseif(isset($request->newrelease))
        {   
            $films = Film::query()->orderBy('Premiere_date', 'desc')->paginate(4);
        }
        elseif(isset($request->search))
        {
            $films = Film::where('title','LIKE',"%{$request->search}%")->orderBy('title')->paginate(4);
        }
        else
        {    
            $films = Film::paginate(4);
        }
            return view('catalog',compact('films'));
    }

    public function random()
    {

        $end = Film::all()->count();
        $rand = rand(1 , $end);

        $kino = Film::where('id', $rand)->get();

        return view('show', compact('kino'));
    }

    public function show($id)
    {   
        $film = Film::findOrFail($id);
        event(new PostHasViewed($film));
        $film = $film->where('id',$id)->get();
        return view('show',['kino'=>$film]);
    }

    public function SortByCat($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category_id = $category['id'];

        $films  = Film::where('category_id', $category_id)->paginate(4);

        return view('catalog',compact('films'));
    }

    public function saveComment(Request $request)
    {
        Comment::create($request->all());

        $id = $request->film_id;

        return redirect('/show/'.$id);
    }

    public function saveFavorite(Request $request)
    {
        Favorite::create($request->all());

        $id = $request->film_id;

        return redirect('/show/'.$id);
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

        return view('home',['users'=>$user]);

    }

    public function collections()
    {
        return view('collections');
    }

}