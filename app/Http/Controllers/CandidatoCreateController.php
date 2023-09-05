<?php

namespace App\Http\Controllers;

use App\Models\CandidatoCreateModels;

use Illuminate\Http\Request;

class CandidatoCreateController extends Controller
{
    public function mostrar()
    {
        return view('components.CantidatoCreate');
    }
    public function lista()
    {
        return view('components.ListEvaluations');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'name' => 'required', 'apellidoP' => 'required', 'apellidoM' => 'required', 'year' => 'required',
            'estado_civil' => 'required', 'domicilio' => 'required', 'fecha_registro' => 'required',
            'vacante' => 'required', 'fecha_evaluacion' => 'required', 'estatus' => 'required', 'nota' => 'required',
            'cv' => 'required'
        ]);
        $candidato = new CandidatoCreateModels();

        $candidato->name = $request->name;
        $candidato->apellidoP = $request->apellidoP;
        $candidato->apellidoM = $request->apellidoM;
        $candidato->year = $request->year;
        $candidato->estado_civil = $request->estado_civil;
        $candidato->domicilio = $request->domicilio;
        $candidato->fecha_registro = $request->fecha_registro;
        $candidato->vacante = $request->vacante;
        $candidato->fecha_evaluacion = $request->fecha_evaluacion;
        $candidato->estatus = $request->estatus;
        $candidato->nota = $request->nota;
        $candidato->cv = $request->cv;

        $candidato->save();
        return redirect()->route('candidato.lista')->with('success','Candidato creado') ;
    }
}
