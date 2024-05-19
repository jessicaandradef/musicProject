@extends('layouts.fe')

@section('content')

    <div class="mt-4">
        <p class="font-detail h5">Olá, {{Auth::user()->name}} !</p>
    </div>


    @if(Auth::user()->perfil == $admin)

            <p class="font-detail mt-3 mb-3">Você está logado na conta ADMIN!</p>

            <div class="mt-5 mb-5">
                <a href="{{route('home')}}" class="font-detail link-detail">
                    Ver todas as bandas disponíveis
                </a>
            </div>

            <div class="mt-5 mb-5 d-flex justify-content-center gap-3">
                <a class="btn btn-primary col-6 mx-auto btn-detail" href="{{route('createBand')}}"> Adicionar uma Banda </a>
                <a class="btn btn-primary col-6 mx-auto btn-detail" href="{{route('createAlbum')}}"> Adicionar um Álbum </a>
            </div>



        <a href="{{route('home')}}" class="font-detail link-detail text-center mb-5">Voltar para Home</a>


    @endif

@endsection
