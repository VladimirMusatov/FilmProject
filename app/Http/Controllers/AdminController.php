<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\DetFilm;
use App\Models\DetSerial;
use App\Models\Serial;
use App\Models\episode;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function admin(Request $request){

        $films = Film::all();

        return view('admin', compact('films'));
    }

    public function addFilm(Request $request)
    {   

        $film_id = $request->Film;  

        $film = Film::where('id', $film_id)->get();      

        return view ('addFilm', compact('film'));
    }

    public function addEpisode(Request $request)
    {   
        $film_id = $request->Film;

        $film = Film::where('id', $film_id)->get();

        return view('addEpisode',compact('film'));
    }

    public function store(Request $request)
    {
    
            $data = $request->all(); 

            $filename = $data['image']->getClientOriginalName();

            $data['image']->move(Storage::path('/public/image/').'films/',$filename);

            $data['image'] = $filename;

            Film::create($data);

            return redirect('admin');
    }

    public function saveDetFilm(Request $request)
    {
        DetFilm::create($request->all());

        return redirect('admin');
    }

    public function saveDetSerial(Request $request)
    {
        DetSerial::create($request->all());

        return redirect('admin');
    }

    public function saveEpisode(Request $request)
    {
        episode::create($request->all());

        return redirect('catalog');
    }

}
