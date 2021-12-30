<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostHasViewed;
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

}