@extends('layouts.app')
@section('title', 'Centros de Salud')
@section('content')
<div class="content-body">
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <div class="card text-white bg-transparent text-center">
            <div class="card-content d-flex">
                <div class="card-body">
                    <img style="border-radius: 10px;" src="/images/logo.png" alt="Médico" width="150" class="float-left mr-2">
                    <h3></h3>
                    <span class="prueba">Centros de Salud</span>
                    <p class="text-left text-muted">Tenemos afiliaciones con los mejores centros de salud de la zona</p>
                </div>
            </div>
        </div>
        <div class="row match-height flex justify-content-center">
            @foreach ($centro_salud as $centros_salud)
            <!-- Profile Cards Starts -->
            <div class="card-b col-md-3 m-3 flex justify-content-center ">
                <div class="card-body mx-auto ">
                    <h4 class="card-title flex justify-content-center">{{$centros_salud->nombre}}</h4>
                    @foreach (App\UsuarioProfesion::where('idusuario', $centros_salud->id)->get() as $usuario_profesiones)
                    <h6 class="card-subtitle font-14 text-muted">{{$usuario_profesiones->profesion->nombre}}</h6>
                    @endforeach

                    @foreach (App\MedicoCentroSalud::where('idusuario', $centros_salud->id)->get() as $medico_centro_salud)
                    <h6 class="card-subtitle font-14 text-muted">{{$medico_centro_salud->centro_salud->nombre}}</h6>
                    @endforeach
                </div>
                <img class="img-fluid  justify-content-center mx-auto " src="{{ route('centro-salud.imagen', ['filename'=>$centros_salud->imagen]) }}" width="150" height="22" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text text-center">{{$centros_salud->descripcion}}</p>
                    <p class="card-text text-center">{{$centros_salud->direccion}}</p>
                    <p class="card-text text-center">Teléfono: {{$centros_salud->telefono}}</p>
                </div>
                <a class="mt-4" href="{{ route('atencion.centro-salud', ['id'=>$centros_salud->idcentros_salud]) }}"><button class="btn btn-outline-success waves-effect waves-light mb-3">Solicitar atención</button></a>
            </div>
            <!-- Profile Cards Ends -->
            @endforeach
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->
</div>
@endsection
