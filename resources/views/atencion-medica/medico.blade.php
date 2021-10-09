@extends('layouts.app')
@section('title', 'Solicitar Atención Médica')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="card col-md-12 bg-transparent m-3 flex justify-content-center ">
                        <div class="card-body mx-auto ">
                            <h4 class="card-title flex justify-content-center">{{$usuario->name}}</h4>
                        </div>
                        {{-- <img class="img-fluid  justify-content-center mx-auto " src="/images/logo.png" width="150" height="22" alt="Card image cap">
 --}}
                        <img class="img-fluid  justify-content-center mx-auto " src="{{ route('user.avatar', ['filename'=>$usuario->imagen]) }}" width="150" height="22" alt="Card image cap">

                        <div class="card-body mx-auto">
                            <p>
                                @foreach (App\UsuarioProfesion::where('idusuario', $usuario->id)->get() as $usuario_profesiones)
                                <span>-{{$usuario_profesiones->profesion->nombre}}-</span>
                                @endforeach
                            </p>
                        </div>
                    </div>

                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif

                    @auth
                    <form class="form form-vertical" action=" {{ action('AtencionMedicaController@saveMedico') }}" novalidate method="POST">
                        @csrf
                        @foreach (App\UsuarioProfesion::where('idusuario', $usuario->id)->get() as $usuario_profesiones)
                        <input type="hidden" value="{{$usuario->name}}" name="nameMedico">
                        @endforeach
                        <input type="hidden" value="{{$usuario->id}}" name="idmedico">
                        <input type="hidden" value="{{Auth::user()->id}}" name="id">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Centro de salud</label>
                                        <select name="idcentro_salud" class="select2 form-control">
                                            @foreach($centro_salud as $centros_salud)
                                            <option value={{$centros_salud->idcentros_salud}}>{{$centros_salud->centro_salud->nombre}}</option>
                                            <input type="hidden" value="{{$centros_salud->centro_salud->nombre}}" name="clinicaNombre">
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Motivo de la atención médica</label>
                                        <textarea name="mensaje" class="form-control" id="basicTextarea" rows="3" placeholder="Escriba el motivo aquí..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Solicitar atención médica</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endauth

                    @guest
                    <div class="alert alert-primary text-center" role="alert">
                        Necesitas tener una cuenta para poder solicitar atención médica
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->
</div>
@endsection
