@extends('layouts.fe')
@section('content')

    <div class="mx-auto text-center mt-4">
        <div >
            <h4 class="font-detail"> Bandas disponíveis no <span class="font-detail">M U S I F Y:</span>  </h4>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                @foreach($allBands as $band)
                    <div class="col-md-3">
                        <div class="card mb-2">
                            {{-- @dd($band->photo) --}}
                            <img src="{{$band->photo ? asset('storage/'.$band->photo) : asset('img/noimgpng.png')}}" class="card-img-top " alt="Foto da banda"/>
                            <div class="card-body">
                                <h5 class="card-title">{{$band->name}}</h5>
                                <p class="card-text">Número de álbuns: {{count($band->albuns)}}</p>
                                <a href="{{route('band.view', $band->id)}}" class="btn btn-primary btn-detail" data-mdb-ripple-init>Ver detalhes</a>
                                @auth

                                    <a href="{{route('edit.band', $band->id)}}" class="btn btn-primary btn-detail mt-2" data-mdb-ripple-init>Editar banda</a>

                                    @if (Auth::user()->perfil == $admin)

                                        <a href="{{route('delete.band', $band->id)}}" class="btn btn-primary btn-detail mt-2" data-mdb-ripple-init>Apagar banda</a>
                                    @endif
                                @endauth

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

@endsection
