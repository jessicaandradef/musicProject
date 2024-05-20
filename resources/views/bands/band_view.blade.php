@extends('layouts.fe')
@section('content')

    <div class="mx-auto text-center mt-4">

        <h4 class="font-detail">Banda: {{ $band->name }}</h4>

        @if (count($band->albuns) == 0)
            <h5 class="mt-4">Desculpe, ainda não há nenhum álbum disponível para a banda {{ $band->name }}!</h5>

            @if (Auth::user()->perfil == $admin)
                <a class="btn btn-primary col-6 mx-auto btn-detail mt-5" href="{{ route('createAlbum') }}"> Adicionar um Álbum
                </a>
            @endif
        @else
            <div class="mt-5 mb-4">
                <p class="font-detail">Álbuns disponíveis: </p>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($band->albuns as $album)
                        <div class="col-md-3">
                            <div class="card mb-3 mt-3">
                                <img src="{{ asset('storage/' . $album->photo) }}" class="card-img-top" alt="Foto do album" />
                                <div class="card-body">
                                    <p class="card-text">Nome do álbum:</p>
                                    <h5 class="card-title"> {{ $album->name }}</h5>
                                    <p class="card-text">Data de lançamento: {{ $album->data_lancamento }}</p>

                                    @auth
                                        <a href="{{route('edit.album', $album->id)}}" class="btn btn-primary btn-detail" data-mdb-ripple-init>Editar
                                            Álbum</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-5 mb-5">
            <a href="{{ route('home') }}" class="font-detail link-detail">Voltar para Home</a>
        </div>

    </div>


@endsection
