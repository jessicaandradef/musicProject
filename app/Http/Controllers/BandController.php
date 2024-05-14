<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    //

    public function createBand()
    {
        return view('bands.create_band');
    }

    public function getAllBands()
    {
        $allBands = Band::get()->all();
        return view('home.index', compact('allBands'));
    }

    public function storeBand(Request $request){

    $band = new Band; //criando uma variável e instanciando o Model Band;

    //preenchendo os dados obrigatorios no banco de dados:

        $band->name = $request->name;

        //image upload;
        if ($request->hasFile('photo') && $request->file('photo') -> isValid()) {

            $requestImage = $request->photo;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")). "." .$extension;

            //adicionando a img a pasta: salva a img nesse path, com esse nome
            $requestImage->move(public_path('img/events'), $imageName);

            $band->photo = $imageName;

            //terminar amanha!!

        }


    }
}
