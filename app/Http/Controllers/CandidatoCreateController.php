<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatoRequest;
use App\Models\CandidatoCreateModels;
use Aws\S3\S3Client;

use Illuminate\Http\Request;

class CandidatoCreateController extends Controller
{
    public function mostrar()
    {
        return view('components.CantidatoCreate');
    }
    public function lista()
    {
        $candidatocreate = CandidatoCreateModels::orderBy('name', 'asc')->Paginate(10);
        return view('components.ListEvaluations', compact('candidatocreate'));
    }


    public function guardar(CandidatoRequest $request)
    {
        $candidato = CandidatoCreateModels::create($request->all());

        return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato creado');
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
    // public function listarArchivosS3()
    // {
    //     // Configura el cliente de AWS S3
    //     $s3 = new S3Client([
    //         'version' => 'latest',
    //         'region' => env('AWS_DEFAULT_REGION'),
    //         'credentials' => [
    //             'key'    => env('AWS_ACCESS_KEY_ID'),
    //             'secret' => env('AWS_SECRET_ACCESS_KEY'),
    //         ],
    //     ]);
    //     // Nombre de tu bucket de S3
    //     $bucketName = 'bucket-rh-ht';

    //     // Obtiene una lista de objetos en el bucket
    //     $result = $s3->listObjects(['Bucket' => $bucketName]);

    //     // Itera a través de los objetos para obtener sus nombres
    //     $archivos = [];
    //     foreach ($result['Contents'] as $objeto) {
    //         $archivos[] = $objeto['Key'];
    //     }

    //     return response()->json(['archivos' => $archivos]);
    // }
}
