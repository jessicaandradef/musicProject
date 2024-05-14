@extends('layouts.fe')

@section('title')
    <title>Login</title>
@endsection

@section('content')

    <form method="POST" action="{{route('password.email')}}">

        @csrf

        <div class="form-group ">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enviar email</button>

    </form>

@endsection
