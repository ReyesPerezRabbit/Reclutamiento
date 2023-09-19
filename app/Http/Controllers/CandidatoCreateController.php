<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatoRequest;
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
        $candidatocreate = CandidatoCreateModels::orderBy('name', 'asc')->simplePaginate(10);
        return view('components.ListEvaluations', compact('candidatocreate'));
    }


    public function guardar(CandidatoRequest $request)
    {
        $candidato = CandidatoCreateModels::create($request->all());

        return redirect()->route('candidato.lista',$candidato)->with('success', 'Candidato creado');
    }

    public function editar(CandidatoCreateModels $candidato)
    {
        return view('components.expediente', compact('candidato'));
    }

    public function actualizar(CandidatoRequest $request, CandidatoCreateModels $candidato)
    {
         // Manejar la carga de la imagen
         if ($request->hasFile('fotografia')) {
            $imagen = $request->file('fotografia');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Definir la ubicación donde se guardará la imagen (por ejemplo, en la carpeta 'fotografias')
            $ubicacion = public_path('fotografias');

            // Mover la imagen al directorio especificado
            $imagen->move($ubicacion, $nombreImagen);

            // Guardar la ruta de la imagen en el modelo
            $candidato->fotografia = 'fotografias/' . $nombreImagen;
            $candidato->save();
        }

        $candidato->update($request->all());
        return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato Editado');
    }
    public function cita()
    {
        return view('components.entrevista');
    }
}