<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatoRequest;
use App\Models\CandidatoCreateModels;

use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

use Illuminate\Http\Request;

class CandidatoCreateController extends Controller
{
    public function mostrar()
    {
        return view('components.CantidatoCreate');
    }

    public function lista(Request $request)
    {
        $query = CandidatoCreateModels::select('*');

        if ($request->filtroVacante != "") {
            $query =  $query->where('vacante', $request->filtroVacante);
        }

        if ($request->estadoCivil != "") {
            $query =  $query->where('estadoCivil', $request->estadoCivil);
        }

        if ($request->filtroEstatus != "") {
            $query = $query->where('status', $request->filtroEstatus);
        }

        $candidatocreate = $query->orderBy('name', 'asc')->paginate(10); // Cambia el número 10 por la cantidad de registros por página que desees

        return view('components.ListEvaluations', compact('candidatocreate'));
    }

    public function guardar(request $request)
    {
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $name = $request->input('name');

            // Configura la conexión con Amazon S3
            $s3 = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2', // Cambia la región según tu configuración
                'credentials' => [
                    'key'    => 'AKIAQDZGXXMNE6BWJ5VO',
                    'secret' => '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',
                ],
            ]);

            $bucketName = 'bucket-rh-ht'; // Reemplaza con el nombre de tu bucket S3

            // Genera el nombre del archivo en la carpeta
            $nombreArchivo = $name . '/' . $cv->getClientOriginalName();

            // Sube el archivo a Amazon S3
            $s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $nombreArchivo,
                'SourceFile' => $cv->getRealPath(), // Obtén la ruta real del archivo
            ]);

            // Guarda la URL del archivo en la base de datos
            $archivoUrl = $s3->getObjectUrl($bucketName, $nombreArchivo);

            // Crea un nuevo candidato en la base de datos y asocia la URL del archivo
            $candidato = CandidatoCreateModels::create($request->all());
            $candidato->cv = $archivoUrl; // Debe ser el nombre correcto del campo en la base de datos
            $candidato->save();

            return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato creado con cv');
        } else {
            // Si no se ha enviado ningún archivo, crea el candidato sin archivo
            $candidato = CandidatoCreateModels::create($request->all());
            return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato creado sin cv.');
        }
    }

    public function editar(CandidatoCreateModels $candidato)
    {
        return view('components.expediente', compact('candidato'));
    }

    public function actualizar(CandidatoRequest $request, CandidatoCreateModels $candidato)
    {
        $candidato->update($request->all());
        return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato Editado');
    }
    
    public function descargarCV(CandidatoCreateModels $candidato)
    {
        // Obtén la URL del CV desde la base de datos
        $cvUrl = $candidato->cv;

        // Extrae el nombre del archivo del URL (puedes usar una función para hacerlo)
        $nombreArchivo = basename($cvUrl);

        // Configura una respuesta para descargar el archivo
        $headers = [
            'Content-Type' => 'application/pdf', // Cambia el tipo de contenido según el tipo de archivo
        ];

        return response()->stream(
            function () use ($cvUrl) {
                readfile($cvUrl);
            },
            200,
            [
                'Content-Type' => 'name/cv', // Cambia el tipo de contenido según el tipo de archivo
                'Content-Disposition' => 'attachment; filename="' . $nombreArchivo . '"',
            ]
        );
        
    }
}
