@extends('layouts.fe')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($allUsers as $user)
            <tr>
                <th scope="row">{{$user ->id}}</th>  <!-- é assim que acedo ao objeto -->
                <td>{{$user ->name}} </td>
                <td>{{$user->email}} </td>
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection


