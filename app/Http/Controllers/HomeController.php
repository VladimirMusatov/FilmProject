<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\DetFilm;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function catalog(Request $request)
    {
        if(isset($request->search))
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

    public function show(Request $request ,$id)
    {   
        $link = $request->video;

        $kino = Film::where('id',$id)->get();

        return view('show',['kino'=>$kino,'link'=>$link]);
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

}