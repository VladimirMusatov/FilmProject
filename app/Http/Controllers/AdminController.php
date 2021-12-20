<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\DetFilm;
use App\Models\DetSerial;
use App\Models\Serial;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function admin(Request $request){

        $films = Film::all();

        return view('admin', compact('films'));
    }

    public function addFilm()
    {   
        return view ('addFilm');
    }

    public function edit($id)
    {   
        $film = Film::where('id', $id)->get();

        return view ('edit',compact('film'));
    }

    public function update(Request $request, Film $film)
    {
  
    }

    public function addDet(Request $request, $id)
    {  
        $film = Film::where('id', $id)->get(['id' => 'id','category_id' => 'category_id',]);

        return view ('add_det',compact('film'));
    }

    public function store(Request $request)
    {
    
            $validate = $request->validate([
                'category_id' => 'integer',
            ]);

            $data = $request->all(); 

            $filename = $data['image']->getClientOriginalName();

            $data['image']->move(Storage::path('/public/image/').'films/',$filename);

            $data['image'] = $filename;

            Film::create($data);

            return redirect('admin');
    }

    public function saveDetFilm(Request $request)
    {   
        $validate = $request->validate([
            'film_id' => 'unique:App\Models\DetFilm,film_id',
        ]);

        DetFilm::create($request->only('director','duration','film_id'));

        Film::where('id',$request->film_id)->update(['status' => $request->status]);

        return redirect('admin');
    }

    public function saveDetSerial(Request $request)
    {

        DetSerial::create($request->only('season', 'episodes','film_id'));

        Film::where('id',$request->film_id)->update(['status' => $request->status]);

        return redirect('admin');
    }

}
