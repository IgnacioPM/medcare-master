<?php

namespace App\Http\Controllers;

use App\AtencionMedica;
use App\CentroSalud;
use App\MedicoCentroSalud;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Mail;

class AtencionMedicaController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $atencion_medica = "";
            if (Auth::user()->idroles == 1) {
                $atencion_medica = AtencionMedica::where('idusuario', Auth::user()->id)->get();
            }

            if (Auth::user()->idroles == 2) {
                $atencion_medica = AtencionMedica::where('idmedico', Auth::user()->id)->get();
            }

            if (Auth::user()->idroles == 3) {
                $atencion_medica = AtencionMedica::all();
            }
            return view('atencion-medica.index', [
                'atencion_medica' => $atencion_medica,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function atencionMedico($id)
    {
        $usuario = User::find($id);
        $centro_salud = MedicoCentroSalud::where('idusuario', $id)->get();

        return view('atencion-medica.medico', [
            'usuario' => $usuario,
            'centro_salud' => $centro_salud,
        ]);
    }

    public function saveMedico(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|min:10', 
       ]);
       AtencionMedica::create([
            'idusuario' => $request->id,
            'idmedico' => $request->idmedico,
            'fecha_atencion' => null,
            'idcentro_salud' => $request->idcentro_salud,
            'mensaje' => $request->mensaje,
            'confirmado' => 0,
            'precio' => null,
        ]);
        Mail::send(
            'emails.nueva-cita',
            [
                'USUARIO' => Auth::user()->name,
                'DOCTOR' =>$request->nameMedico, 
                'CLINICA' =>$request->clinicaNombre, 
                'msg' =>$request->mensaje, 
                'correo' => Auth::user()->email,
            ],
            function ($mail) use ($request) {
                $mail->from(Auth::user()->email, Auth::user()->email);
                $mail
                    ->to('plantonk1@gmail.com')
                    ->subject('Cita medica');
            }
        );

        return redirect()->route('atencion.index')->with('message', 'Se ha enviado tu solicitud de atenci??n m??dica con ??xito!');
     } 

    public function atencionCentroSalud($id)
    {
        $centro_salud = CentroSalud::find($id);
        $medico = MedicoCentroSalud::where('idcentros_salud', $id)->get();

        return view('atencion-medica.centro-salud', [
            'centro_salud' => $centro_salud,
            'medico' => $medico,
        ]);
    }

    public function saveCentroSalud(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|min:10', 
       ]);
        AtencionMedica::create([
            'idusuario' => $request->id,
            'idmedico' => $request->idmedico,
            'fecha_atencion' => null,
            'idcentro_salud' => $request->idcentro_salud,
            'mensaje' => $request->mensaje,
            'confirmado' => 0,
            'precio' => null,
        ]);

        Mail::send(
            'emails.nueva-cita',
            [
                'USUARIO' => Auth::user()->name,
                'DOCTOR' =>$request->nameMedico, 
                'CLINICA' =>$request->clinicaNombre, 
                'msg' =>$request->mensaje, 
                'correo' => Auth::user()->email,
            ],
            function ($mail) use ($request) {
                $mail->from(Auth::user()->email, Auth::user()->email);
                $mail
                    ->to('plantonk1@gmail.com')
                    ->subject('Cita centro de salud');
            }
        );
       
        return redirect()->route('atencion.index')->with('message', 'Se ha enviado tu solicitud de atenci??n m??dica con ??xito!');
    }

    public function edit($id)
    {
        $atencion_medica = AtencionMedica::find($id);

        return view('atencion-medica.edit', [
            'atencion_medica' => $atencion_medica,
        ]);
    }

    public function update(Request $request)
    {

        if (Auth::user()->idroles == 2 || Auth::user()->idroles == 3) {
            AtencionMedica::where('idatencion_medica', $request->id)
            ->update(['fecha_atencion' => $request->fecha_atencion,
                'hora_atencion' => $request->hora_atencion,
                'precio' => $request->precio]);
        }else {
            AtencionMedica::where('idatencion_medica', $request->id)
            ->update(['confirmado' => 1]);
        }
        
        return redirect()->route('atencion.edit', ['id' => $request->id])->with('message', 'Se ha actualizado la atenci??n m??dica con ??xito!');
    }
    public function delete($id)
    {
        $eventoEliminar = AtencionMedica::find($id);
        try {
            $eventoEliminar->delete();
            $status=1;
        } catch (\Illuminate\Database\QueryException $e) {
            $status=2;
        }
        if ($status==1) {
            return redirect('/atenciones')->with('eliminar', 'ok');
        }else {
            return back()->with('messageError', 'No se puede eliminar porque tiene dependencias');
        }
    }
}
