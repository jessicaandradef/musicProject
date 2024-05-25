<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    //

    public function createBand()
    {
        return view('bands.create_band');
    }

    public function getAllBands()
    {
        $admin = User::TYPE_ADMIN;
        $allBands = Band::get()->all();
        return view('home.index', compact('allBands', 'admin'));
    }

    public function deleteBand($id) {

       $admin = User::TYPE_ADMIN;
        Album::where('banda_id', $id)->delete();
        Band::where('id', $id)->delete();

        return redirect() -> route('home');
    }

    public function viewBand($id)
    {

        $admin = User::TYPE_ADMIN;

        $band = Band::findOrFail($id);
        $album = Album::where('banda_id', $id)->first();

        return view('bands.view_band', compact('band', 'album', 'admin'));
    }

    public function storeBand(Request $request){
        $photo = null;

            $request->validate([
                'name' => 'string|max:50',
                'photo' => 'image'
            ]);

            if ($request->hasFile('photo')){
                $photo = Storage::putFile('bands/', $request->photo);
            }

            $adminId = Auth::id();

            Band::insert([
                'name' => $request->name,
                'photo' => $photo,
                'admin_id' => $adminId,
            ]);

            return redirect() ->route('home') ->with('message', 'Banda '. $request->name.' adicionada com sucesso');
    }

    public function editBand(Request $request, $id){

        $banda = Band::findOrFail($id);

        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('photo')) {
                // Apagar a imagem antiga se existir
                if ($banda->photo) {
                    Storage::disk('public')->delete($banda->photo);
                }

                // Fazer upload da nova imagem
                $photoPath = $request->file('photo')->store('bands', 'public');
                $banda->photo = $photoPath;
            }

            $banda->name = $request->name;
            $banda->save();

            return redirect('/home')->with('msg', 'Banda atualizada com sucesso!');
        }

        return view('bands.edit_band', compact('banda'));

    }


}
