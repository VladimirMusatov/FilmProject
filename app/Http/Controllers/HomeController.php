<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalog;
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

        if($request->filled('search')){

                $search = $request ->search;
                $film = Catalog::where('title', '=', $search)->get();

        }
        else{
                $categories = Category::orderBy('title')->get();
                $film = Catalog::all();
        }

        return view('catalog',compact('film'));
    }

    public function random()
    {

        $end = DB::table('catalogs')->count();
        $rand = rand(1 , $end);

        $film = DB::table('catalogs')->where('id', $rand)->get();

        return view('random', compact('film'));
    }

    public function show($title)
    {

        $kino = DB::table('catalogs')->where('title', $title)->get();

        return view('show', compact('kino'));
    }

    public function SortByCat($id)
    {

        $film  = Catalog::where('category_id', $id)->get();

        return view('catalog',compact('film'));
    }

}