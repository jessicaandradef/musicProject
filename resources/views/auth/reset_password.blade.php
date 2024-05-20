@extends('layouts.fe')
@section('content')
    <br>
    <form  method="POST" action="{{route('password.update')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value= "{{request()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            Erro de email
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" value= ""  class="form-control" id="exampleInputPassword1">
            @error('password')
            Erro de password
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confime Password</label>
            <input type="password_confirmation" name="password_confirmation" value= ""  class="form-control" id="exampleInputPassword1">
            @error('password')
            Erro de password
            @enderror
        </div>
        <input type="hidden" name="token" value="{{request()->route('token')}}">
        <button type="submit" class="btn btn-primary">Update Pass</button>
    </form>
@endsection
