@extends('layouts.fe')

@section('content')

    {{--colocando o formulário no centro da tela em 6 colunas--}}
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1 class="mt-4">Adicione uma Banda:</h1>

        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf {{--Diretiva do laravel, tem que colocar para conseguir enviar o formulário para conseguir enviar dados ao BD --}}

            <div class="form-group">
                <label for="image">Imagem da banda:</label>
                <input type="file" id="image" name="image" class="form-control-file mb-3">
            </div>

            <div class="form-group">
                <label for="title">Nome da banda:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da banda">
            </div>

            <div class="form-group">
                <label for="title">Número de álbuns da banda:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Número de álbuns">
            </div>

            <input type="submit" class="btn btn-primary my-2" value="Adicionar Banda">
        </form>
    </div>
@endsection
