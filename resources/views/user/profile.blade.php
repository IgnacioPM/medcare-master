@extends('layouts.app')
@section('title', 'Perfil')
@section('content')
    <div id="user-profile">
        @if(Auth::user()->idroles == 3 && $usuario->idroles === 2)
        <form class="form form-vertical" action=" {{ action('UsuarioController@eliminarMedico') }}" novalidate method="POST">
            @csrf
            <input type="hidden" value={{$usuario->id}} name="id" />
            <div class="text-right mb-2">
                <button type="submit" class="btn btn-danger">Eliminar médico</button>
            </div>
        </form>
        @endif
        <div class="row flex justify-content-center">
            <div class="col-md-6 flex justify-content-center ">
                <div class="card-body mx-auto ">
                    <div class="mt-8 ">
                        <div class="card-c col-md-12 m-3 flex justify-content-center ">
                            <div class="card-header mb-4">
                                <div class="mx-auto">
                                    <h4>Acerca de</h4>
                                </div>
                            </div>
                            @if( route('user.avatar', ['filename'=>$usuario->imagen]) !=null)
                            <div class="mt-4 mt-md-0">
                                <img alt="" src="{{ route('user.avatar', ['filename'=>$usuario->imagen]) }}" class="rounded-circle img-border box-shadow-1" data-holder-rendered="true">
                            </div>
                            @endif
                            <div class="card-body">
                                <h4 class="mb-0">Nombre:</h4>
                                <p class="card-text text-center">{{$usuario->name}}</p>
                                <h4 class="mb-0">Cédula:</h4>
                                <p class="card-text text-center">{{$usuario->cedula}}</p>
                                <h4 class="mb-0">Correo electrónico:</h4>
                                <p>{{$usuario->email}}</p>
                                <h4 class="mb-0">Solicitudes: {{$atencion_medica->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
