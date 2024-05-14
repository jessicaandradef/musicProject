
@extends('layouts.fe')

@section('content')

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">

                        <form method="POST" action="{{route('store.user')}}">
                            @csrf

                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-5 text-uppercase">Registo</h2>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="text" id="nome" class="form-control form-control-lg" name="name" />
                                        <label class="form-label" for="typeEmailX">Nome</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>


                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Criar Conta</button>

                                    <p class="small mb-5 mt-2 pb-lg-2"><a class="text-white-50" href="{{route('login')}}">Já tens uma conta? Entre na sua conta</a></p>

                                </div>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


