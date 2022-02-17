<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
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

    public function SortByCat($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category_id = $category['id'];

        $films  = Film::where('category_id', $category_id)->paginate(4);

        return view('catalog',compact('films'));
    }

    public function collections()
    {
        return view('collections');
    }
}
