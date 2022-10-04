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

                        <div>
                            <p style="font-size: 20px" class="fw-bold">Fotos subidas recientemente</p>

                            @foreach ($users as $user)
                                @if ($user->foto != '' && $user->foto_aceptada == '')
                                    <div class="border mb-3" style="width: fit-content">
                                        <form action="{{ route('aceptarFoto') }}" method="POST">
                                            @csrf
                                            <p>{{ $user->name }}</p>
                                            <input type="email" name="email" value="{{ $user->email }}" hidden>
                                            <img src="img/post/{{ $user->foto }}" width="100" height="100"
                                                alt="">
                                            <button type="submit" class="btn btn-success btn-sm">Aceptar foto</button>
                                        </form>
                                        <br>
                                        <form action="{{ route('rechazarFoto') }}" method="POST">
                                            @csrf
                                            <input type="email" name="email" value="{{ $user->email }}" hidden>
                                            <button type="submit" class="btn btn-danger btn-sm">Rechazar foto</button>
                                        </form>


                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <hr>

                        <div>
                            <p style="font-size: 20px" class="fw-bold">Fotos Aceptadas</p>

                            @foreach ($users as $user)
                                @if ($user->foto != '' && $user->foto_aceptada == 1)
                                    <div class="border mb-3" style="width: fit-content">
                                        <form action="{{ route('rechazarFoto') }}" method="POST">
                                            @csrf
                                            <p>{{ $user->name }}</p>
                                            <input type="email" name="email" value="{{ $user->email }}" hidden>
                                            <img src="img/post/{{ $user->foto }}" width="100" height="100"
                                                alt="">
                                            <button type="submit" class="btn btn-danger btn-sm">Rechazar foto</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <hr>
                        <div>
                            <p style="font-size: 20px" class="fw-bold">Fotos Rechazadas</p>

                            @foreach ($users as $user)
                                @if ($user->foto != '' && $user->foto_aceptada == 3)
                                    <div class="border mb-3" style="width: fit-content">
                                        <form action="{{ route('aceptarFoto') }}" method="POST">
                                            @csrf
                                            <p>{{ $user->name }}</p>
                                            <input type="email" name="email" value="{{ $user->email }}" hidden>
                                            <img src="img/post/{{ $user->foto }}" width="100" height="100"
                                                alt="">
                                            <button type="submit" class="btn btn-success btn-sm">Aceptar foto</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
