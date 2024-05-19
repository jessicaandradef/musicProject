@extends('layouts.fe')

@section('content')

    {{--colocando o formulário no centro da tela em 6 colunas--}}
    <div class="col-md-6 offset-md-3">
        <h1 class="mt-4">Adicione uma Banda:</h1>

        <form action="{{route('store.band')}}" method="POST" enctype="multipart/form-data">
            @csrf {{--Diretiva do laravel, tem que colocar para conseguir enviar o formulário para conseguir enviar dados ao BD --}}

            <div class="form-group">
                <label for="photo">Imagem da banda:</label>
                <input type="file" id="photo" name="photo" class="form-control-file mb-3" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Nome da banda:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome da banda">
            </div>

            <input type="submit" class="btn btn-primary my-2" value="Adicionar Banda">
        </form>
    </div>
@endsection
