@extends('layouts.fe')
 @section('content')

     Essa será a home!

     @foreach($allBands as $band)

         <div class="card">
             <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
             <div class="card-body">
                 <h5 class="card-title">{{$band->name}}</h5>
                 <p class="card-text">numero de álbuns</p>
                 <a href="#!" class="btn btn-primary" data-mdb-ripple-init>Ver detalhes</a>
             </div>
         </div>
     @endforeach


 @endsection
