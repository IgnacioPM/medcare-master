@extends('layouts.app')
@section('title', 'Inicio de sesión')
@section('content')
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20">Bienvenido de nuevo!</h5>
                            <p class="text-white-50">Inicia sesión para continuar a MedCare.</p>
                            <a href="/" class="logo logo-admin">
                                <img src="/images/logo.png" height="70" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid 
                                    @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p>No tienes una cuenta? <a href="/register" class="fw-medium text-primary"> Registrate</a> </p>
                    <p class="mb-0"> <script>
                           /*  document.write(new Date().getFullYear())*/
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
