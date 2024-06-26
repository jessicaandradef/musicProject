@extends('layouts.fe')

@section('content')


    <h1 class="mt-5 text-center font-detail">Adicione uma Banda:</h1>

    {{--colocando o formulário no centro da tela em 6 colunas--}}
    <div class="mt-3 mb-5 d-flex justify-content-center">

        <form action="{{route('store.band')}}" method="POST" enctype="multipart/form-data" class="w-70 font-detail fs-6">
            @csrf {{--Diretiva do laravel, tem que colocar para conseguir enviar o formulário para conseguir enviar dados ao BD --}}

            <div class="form-group">
                <label for="photo">Imagem da banda:</label>
                <input type="file" id="photo" name="photo" class="form-control-file mb-3" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Nome da banda:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome da banda">
            </div>

            <button type="submit" class=" btn btn-primary my-3 btn-detail">Adicionar Banda</button>
        </form>
    </div>
@endsection
