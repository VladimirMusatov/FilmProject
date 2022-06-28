<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Comment;
use App\Models\DetFilm;
use App\Models\DetSerial;
use App\Models\Watched;
use App\Models\Favorite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function admin(Request $request){

        if($request->search)
        {
            $films = Film::where('title','LIKE',"%{$request->search}%")->orderBy('title')->paginate(10);
        }
        elseif($request->nonedet)
        {
            $films = Film::where('status',0)->paginate(10);
        }
        else
        {
            $films = Film::paginate(10);
        }

        return view('admin', compact('films'));
    }

    public function addFilm()
    {   
        return view ('addFilm');
    }

    public function edit($id)
    {   
        $film = Film::where('id', $id)->get();

        return view ('edit',['film'=>$film]);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
                'title' => 'required',
                'OrigTitle' => 'required',
                'Premiere_date' => 'required', 
                'description' => 'required',
                'image' => 'required',
                'link' =>  'required',
                'category_id' => 'integer',
        ]);


        if($request->category_id == 1 || $request->category_id == 3)
        {
            $validate = $request->validate([
                'director' => 'required',
                'duration' => 'required',
            ]);

            DetFilm::where('id', $request->film_id)->updateOrInsert([
                'director'=>$request->director,
                'duration'=>$request->duration,
                'film_id'=>$request->film_id,
            ]);
        }
        else
        {
           $validate = $request->validate([
                'season' => 'required|integer',
                'episodes' => 'required|integer',
            ]);

            DetSerial::where('id', $request->film_id)->updateOrInsert([
                'season'=>$request->season,
                'episodes'=>$request->episodes,
                'film_id'=>$request->film_id,
            ]);
        }
            $data = $request->all(); 

            // Удаление старой фотографии
            $img = Film::where('id',$request->id)->first('image');
            $path = 'public/image/films/'.$img['image'];
            $file = Storage::delete($path);

            //Сохранение новой фотографии
            $filename = $data['image']->getClientOriginalName();
            $data['image']->move(Storage::path('/public/image/').'films/',$filename);   
            $data['image'] = $filename;

            Film::where('id', $request->id)->update([
                'title'=>$data['title'],
                'OrigTitle'=>$data['OrigTitle'],
                'description'=>$data['description'],
                'image'=>$data['image'],
                'CreatDate'=>$data['CreatDate'],
                'Premiere_date'=>$data['Premiere_date'],
                'status' => 1,
            ]);

            return redirect('admin')->with('success','Данные измененны');
    }

    public function addDet(Request $request, $id)
    {  
        $film = Film::where('id', $id)->get(['id' => 'id','category_id' => 'category_id',]);

        return view ('add_det',compact('film'));
    }

    public function store(Request $request)
    {
            $validate = $request->validate([
                'title' => 'unique:films|required',
                'OrigTitle' => 'required',
                'Premiere_date' => 'required', 
                'description' => 'required',
                'image' => 'required',
                'link' =>  'required',
                'category_id' => 'integer',
            ]);

            $data = $request->all(); 

            $filename = $data['image']->getClientOriginalName();

            $data['image']->move(Storage::path('/public/image/').'films/',$filename);

            $data['image'] = $filename;

            Film::create($data);

            return redirect('admin')->with('success','Контент был успешно добавлен');
    }

    //Удаление фильма
    public function delete($id)
    {
        Film::where('id', $id)->delete();
        Comment::where('film_id', $id)->delete();
        DetFilm::where('film_id',$id)->delete();
        DetSerial::where('film_id',$id)->delete();
        Favorite::where('film_id',$id)->delete();
        Watched::where('film_id',$id)->delete();

        return redirect()->back();
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
