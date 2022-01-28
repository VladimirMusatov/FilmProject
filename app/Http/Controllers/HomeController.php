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

        return view('home',['users'=>$user]);
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
                'description' => 'required',

        ]);

        $data = $request->all();
        $user_id = $request->user_id;

        // Удаление старой фотографии
        $img = Detail_user::where('user_id',$request->user_id)->first('user_img');
        $path = 'public/image/home/'.$user_id.'/'.$img['user_img'];
        $file = Storage::delete($path);

        //Сохранение новой фотографии
        $filename = $data['user_img']->getClientOriginalName();
        $data['user_img']->move(Storage::path('/public/image/').'home/'.$data['user_id'],$filename);
        $data['user_img'] = $filename;

        User::where('id', $user_id)->update(['name'=>$data['name']]);
        Detail_user::where('user_id',$user_id)->update(['description'=>$data['description'],'user_img'=>$data['user_img']]);

        $user = User::where('id', $user_id)->get();

        return view('home',['users'=>$user]);
    }

}