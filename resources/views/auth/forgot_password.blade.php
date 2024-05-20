@extends('layouts.fe')

@section('title')
    <title>Login</title>
@endsection

@section('content')

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <form method="POST" action="{{route('password.email')}}">
                            @csrf

                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h5 class="fw-bold mb-2 text-uppercase">Recuperação de password</h5>
                                    <p class="text-white-50 mb-5">Please enter your email!</p>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Recuperar senha</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
