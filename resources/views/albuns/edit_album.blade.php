@extends('layouts.fe')

@section('content')

    <h1 class="mt-5 text-center font-detail">Edite um Álbum:</h1>

    <div class="mt-3 mb-5 d-flex justify-content-center">

        <form action="{{route('edit.album', $banda->id)}}" method="POST" enctype="multipart/form-data" class="w-70 font-detail fs-6">
            @csrf {{--Diretiva do laravel, tem que colocar para conseguir enviar o formulário para conseguir enviar dados ao BD --}}

            <div class="form-group">
                <label for="photo">Imagem do Álbum:</label>
                <input type="file" id="photo" name="photo" class="form-control-file mb-3" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Nome do Álbum:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome da banda">
            </div>

            <button type="submit" class=" btn btn-primary btn-detail mt-2">Editar Álbum</button>
        </form>
    </div>


@endsection
