<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function createAlbum()
    {
        $allBands = Band::get()->all();

        return view('bands.create_album', compact('allBands'));
    }

    public function storeAlbum(Request $request){

            $request->validate([
                'name' => 'string|max:50',
                'banda_id' => 'required|exists:bandas,id',
                'data_lancamento' => 'required|date',
                'photo' => 'image'
            ]);

            $photo = null;

            if ($request->hasFile('photo')){
                $photo = Storage::putFile('albuns/', $request->photo);
            }

            Album::insert([
                'name' => $request->name,
                'banda_id' => $request->banda_id,
                'data_lancamento' => $request->data_lancamento,
                'photo' => $photo,

            ]);

        return redirect() ->route('dashboard') ->with('message', 'Album '. $request->name.' adicionado com sucesso');

        }
}
