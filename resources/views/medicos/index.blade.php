@extends('layouts.app')
@section('title', 'Médicos')
@section('content')
<div class="content-body">
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <div class="card text-white bg-transparent text-center mt-4">
            <div class="card-content d-flex">
                <div class="card-body">
                    <img style="border-radius: 10px;" src="/images/logo.png" alt="Médico" width="150" class="float-left mr-2">
                    <h1></h1>
                    <span class="prueba">Médicos</span>
                    <p class="text-left text-muted">Los mejores especialistas disponibles para ti</p>
                </div>
            </div>
        </div>
        <div class="row match-height flex justify-content-center">
            @foreach ($medico as $medicos)
            <!-- Profile Cards Starts -->
            <div class="card-b col-md-3 m-3 flex justify-content-center ">
                <div class="card-body mx-auto ">
                    <h4 class="card-title flex justify-content-center">{{$medicos->name}}</h4>
                    @foreach (App\UsuarioProfesion::where('idusuario', $medicos->id)->get() as $usuario_profesiones)
                    <h6 class="card-subtitle font-14 text-muted">{{$usuario_profesiones->profesion->nombre}}</h6>
                    @endforeach

                    @foreach (App\MedicoCentroSalud::where('idusuario', $medicos->id)->get() as $medico_centro_salud)
                    <h6 class="card-subtitle font-14 text-muted">{{$medico_centro_salud->centro_salud->nombre}}</h6>
                    @endforeach
                </div>
                @if( route('user.avatar', ['filename'=>$medicos->imagen]) !=null)
                <div class="mt-4 mt-md-0">
                    <img class="rounded-circle avatar-xl" alt="" src="{{ route('user.avatar', ['filename'=>$medicos->imagen]) }}" data-holder-rendered="true">
                </div>
                @endif
                <div class="card-body">
                    <p class="card-text text-center">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="float-left">
                            <a href="{{ route('atencion.medico', ['id'=>$medicos->id]) }}" class="card-link">Solicitar atención</a>
                        </div>
                        <div class="float-right">
                            <i class="feather icon-briefcase text-primary mr-50"></i>
                            {{App\AtencionMedica::where(['idmedico' => $medicos->id, 'confirmado' => 1])->count()}} atenciones
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Cards Ends -->
            @endforeach
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->
</div>
@endsection
