@extends('layouts.app')
@section('title', 'Atenciones Médicas')
@section('content')
<div class="content-body">
    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="card text-white bg-transparent text-center">
            <div class="card-content d-flex">
                <div class="card-body">
                    <img style="border-radius: 10px;" src="/images/logo.png" alt="Médico" width="150" class="float-left mr-2">
                    <h3></h3>
                    <span class="prueba">Atenciones médicas</span>
                    <p class="text-left text-muted">Aquí encontrarás todas las solicitudes que estén relacionadas contigo</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <h4 class="card-title">Citas médicas</h4>
                        <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p>
 --}}
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Usuario solicitante</th>
                                            <th data-priority="3">Médico</th>
                                            <th data-priority="1">Fecha de atención</th>
                                            <th data-priority="3">Centro de salud</th>
                                            <th data-priority="3">Mensaje</th>
                                            <th data-priority="6">Precio</th>
                                            <th data-priority="6">Confirmada</th>
                                            <th data-priority="6">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($atencion_medica as $atenciones)
                                        <tr>
                                            <td>{{ $atenciones->user->name }} ({{ $atenciones->user->cedula }})</td>
                                            <td>{{ $atenciones->medico->name }}</td>
                                            @if($atenciones->fecha_atencion)
                                            <td>{{ $atenciones->fecha_atencion }} - {{ $atenciones->hora_atencion }} </td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            <td>{{ $atenciones->centro_salud->nombre }}</td>
                                            <td>{{ $atenciones->mensaje }}</td>
                                            @if($atenciones->precio)
                                            <td>₡{{ number_format($atenciones->precio, 2) }}</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            @if($atenciones->confirmado == 1)
                                            <td>
                                                <h4><i class="fas fa-calendar-check"></i></h4>
                                            </td>
                                            @else
                                            <td>
                                                <h4><i class="feather icon-clock text-warning"></i></h4>
                                            </td>
                                            @endif
                                            <td>
                                                @if(Auth::check() && Auth::user()->idroles == 1)
                                                @if($atenciones->fecha_atencion)
                                                <a href="{{ route('atencion.edit', ['id'=>$atenciones->idatencion_medica]) }}" class="btn btn-icon btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"> </i></a>
                                                @else
                                                <a href="#" class="btn btn-icon disabled btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"> </i></a>
                                                @endif
                                                @else
                                                <a href="{{ route('atencion.edit', ['id'=>$atenciones->idatencion_medica]) }}" class="btn btn-icon btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"> </i></a>
                                                @endif
                                                <form action="{{ route('atencion.delete', ['id' => $atenciones->idatencion_medica]) }}" class="formulario-eliminar btn btn-icon btn-icon rounded-circle bg-gradient-warning mr-1 mb-1 waves-effect waves-light" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-icon btn-icon rounded-circle bg-gradient-warning mr-1 mb-1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Eliminar cita">
                                                        <i class="fa fa-trash"> </i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </section>
    <!-- Column selectors with Export Options and print table -->
</div>
@endsection
