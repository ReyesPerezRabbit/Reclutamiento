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
        $query = CandidatoCreateModels::select('*')
            ->when($request->filled('filtroVacante'), function ($q) use ($request) {
                return $q->where('vacante', $request->filtroVacante);
            })
            ->when($request->filled('estadoCivil'), function ($q) use ($request) {
                return $q->where('estadoCivil', $request->estadoCivil);
            })
            ->when($request->filled('filtroEstatus'), function ($q) use ($request) {
                return $q->where('status', $request->filtroEstatus);
            });

        $candidatocreate = $query->orderBy('name', 'asc')->paginate(10);

        return view('components.ListEvaluations', compact('candidatocreate'));
    }


    public function guardar(Request $request)
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
                'SourceFile' => $cv->getPathname(), // Obtén la ruta real del archivo
               // 'ACL' => 'public-read', // Establece los permisos públicos
            ]);

            // Crea un nuevo candidato en la base de datos y asocia el nombre del archivo
            $candidato = CandidatoCreateModels::create($request->all());
            $candidato->cv = $nombreArchivo; // Guarda solo el nombre del archivo
            $candidato->save();

            return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato creado con cv');
        } else {
            // Si no se ha enviado ningún archivo, crea el candidato sin archivo
            $candidato = CandidatoCreateModels::create($request->all());
            return redirect()->route('candidato.lista', $candidato)->with('success', 'Candidato creado sin cv.');
        }
    }

    public function descargarCV($id)
    {
        // Obtener el candidato por ID
        $candidato = CandidatoCreateModels::find($id);

        // Verificar si el candidato existe y tiene un archivo adjunto
        if ($candidato && $candidato->cv) {
            // Configurar la conexión con Amazon S3
            $s3 = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2',
                'credentials' => [
                    'key'    => 'AKIAQDZGXXMNE6BWJ5VO',
                    'secret' => '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',
                ],
            ]);

            $bucketName = 'bucket-rh-ht'; // Reemplaza con el nombre de tu bucket S3
            $nombreArchivo = $candidato->cv;


            // Obtener la URL firmada del archivo en S3 (válida por un tiempo limitado)
            $url = $s3->getObjectUrl($bucketName, $nombreArchivo, '+15 minutes'); // Cambia el tiempo de expiración según tus necesidades

            // Redirigir al usuario a la URL firmada para la descarga
            return redirect($url);
        }

        // Si el candidato no existe o no tiene un archivo adjunto, redirigir con un mensaje de error
        return redirect()->back()->with('error', 'El candidato no tiene un archivo adjunto para descargar.');
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
}
