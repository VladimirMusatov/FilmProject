<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function admin(){

        return view('admin');
    }

    public function addFilm(){

        return view ('addFilm');

    }

    public function store(Request $request){

       $data = $request->all(); 

       $filename = $data['image']->getClientOriginalName();

       $data['image']->move(Storage::path('/public/image/').'films/',$filename);

       $data['image'] = $filename;

       Film::create($data);

       return redirect('admin');

    }
}
