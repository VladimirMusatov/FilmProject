<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Serial;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function admin(){

        return view('admin');
    }

    public function addFilm(Request $request){

        $type = $request->type;

        return view ('addFilm', compact('type'));

    }

    public function store(Request $request){

       $category_id = $request->category_id; 

       if($category_id == 1 || $category_id == 3){

            $data = $request->all(); 

            $filename = $data['image']->getClientOriginalName();

            $data['image']->move(Storage::path('/public/image/').'films/',$filename);

            $data['image'] = $filename;

            Film::create($data);


       }

       elseif ($category_id == 2 || $category_id == 4 || $category_id == 5 ) {
           
            $data = $request->all();

            $filename = $data['image']->getClientOriginalName();

            $data['image']->move(Storage::path('/public/image/').'serials/',$filename);

            $data['image'] = $filename;

            Serial::create($data);
       }


        return redirect('admin');

    }
}
