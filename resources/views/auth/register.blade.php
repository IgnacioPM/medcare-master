@extends('layouts.app')
@section('title', 'Registro')
@section('content')
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-4 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="bg-primary">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20">Registro gratis</h5>
                            <p class="text-white-50">Consigue tu cuenta en MedCare ahora.</p>
                            <a href="index.html" class="logo logo-admin">
                                <img src="/images/logo.png" height="70" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4 mt-4">
                        <div class="p-3">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row m-2">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-2">
                                    <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                                    <div class="col-md-6">
                                        <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="off" autofocus>

                                        @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-2">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-2">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-2">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row m-2">
                                    <div class="col-md-6">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" @error('avatar') is-invalid @enderror" name="avatar" autocomplete="avatar">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-2 mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrarme') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p>Ya tienes una cuenta? <a href="/login" class="fw-medium text-primary"> Iniciar sesión </a> </p>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
