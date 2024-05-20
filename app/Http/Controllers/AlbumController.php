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

        return view('albuns.create_album', compact('allBands'));
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

        return redirect() ->route('dashboard') ->with('msg', 'Album '. $request->name.' adicionado com sucesso');

        }

    public function editAlbum(Request $request, $id){

        $album = Album::findOrFail($id);
        $banda = $album->banda;

        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->has('name')){
                $album->name = $request->name;
            }

            if ($request->hasFile('photo')) {
                // Apagar a imagem antiga se existir
                if ($album->photo) {
                    Storage::disk('public')->delete($album->photo);
                }

                // Fazer upload da nova imagem
                $photoPath = $request->file('photo')->store('albuns', 'public');
                $album->photo = $photoPath;
            }

            $album->name = $request->name;
            $album->save();

            return redirect('/home')->with('msg', 'Album atualizada com sucesso!');
        }

        return view('albuns.edit_album', compact('album', 'banda'));

    }
}
