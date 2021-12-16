<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\DetFilm;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $films = Film::all();

        return view('catalog',compact('films'));
    }

    public function random()
    {

        $end = DB::table('films')->count();
        $rand = rand(1 , $end);

        $kino = Film::where('id', $rand)->get();

        return view('show', compact('kino'));
    }

    public function show($id)
    {   
        $kino = Film::where('id',$id)->get();

        return view('show', compact('kino'));
    }

    public function SortByCat($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category_id = $category['id'];

        $films  = Film::where('category_id', $category_id)->get();

        return view('catalog',compact('films'));
    }

}