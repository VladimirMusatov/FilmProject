<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostHasViewed;
use App\Models\Film;
use App\Models\Comment;

class ShowController extends Controller
{
    public function show($id)
    {   
        $film = Film::findOrFail($id);
        event(new PostHasViewed($film));
        $film = $film->where('id',$id)->get();
        return view('show',['kino'=>$film]);
    }

    public function random()
    {

        $end = Film::all()->count();
        $rand = rand(1 , $end);

        $kino = Film::where('id', $rand)->get();

        return view('show', compact('kino'));
    }

    public function saveComment(Request $request)
    {
        Comment::create($request->all());

        $id = $request->film_id;

        return redirect('/show/'.$id);
    }
}
