@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" name="name"
                                    placeholder="Name" value="{{ Auth::user()->name }}">
                                <label for="floatingName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com" value="{{ Auth::user()->email }}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <input type="file" class="form-control mb-3" name="imagen" id="floatingPassword"
                                placeholder="Password">
                            <img src="img/post/{{ Auth::user()->foto }}" width="100" height="100" alt="">
                            @if (Auth::user()->foto_aceptada == 0)
                                <span style="color: red">Tu foto aún no ha sido aceptada, espera respuesta de un admin</span>
                            @else
                                <span style="color: green">Tu foto ha sido aceptada</span>
                            @endif
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
