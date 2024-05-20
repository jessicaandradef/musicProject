@extends('layouts.fe')

@section('content')

    <h1 class="mt-5 text-center font-detail">Adicione novo álbum:</h1>

    <div class="mt-3 mb-5 d-flex justify-content-center">

        <form method="POST" action="{{route('store.album')}}" enctype="multipart/form-data" class="w-70 font-detail fs-6">    <!-- rota para onde será enviada os dados -->
            @csrf   <!-- helper de validação do Laravel-->

            <div class="form-group mt-4 ">
                <label for="name">Nome do Album:</label>
                <input type="text" class="form-control" name="name" value="" id="name"  placeholder="Escreve o nome do álbum">
            </div>
            @error('band_id')
            Nome invalido!
            @enderror

            <div class="form-group">

                <div class=" d-flex column mt-4">
                    <label for="banda_id">Nome da Banda: </label>
                    <select name="banda_id" class="dropdown rounded-2 mx-2">
                        @foreach ($allBands as $band)
                            <option value="{{$band->id}}">{{$band->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group mt-4">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" >
            </div>

            <div class="form-group mt-4">
                <label for="photo">Imagem do Álbum:</label>
                <input type="file" id="photo" name="photo" class="form-control-file mb-3" accept="image/*">
            </div>

            @error('band_id')
            Band_id invalido!
            @enderror

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-detail text-white my-3 ">Adicionar Álbum</button>

            </div>
        </form>
    </div>


@endsection
