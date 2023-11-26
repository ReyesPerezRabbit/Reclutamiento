<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;

use App\Models\Entrevista;
use Illuminate\Http\Request;

class AgendaEntrevistaController extends Controller
{
    public function cita()
    {
        return view('components.entrevista');
    }
    public function listarArchivosS3()
    {
        // Configura la conexión con Amazon S3
            $s3 = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2', // Cambia la región según tu configuración
                'credentials' => [
                    'key'    => 'AKIAQDZGXXMNE6BWJ5VO',
                    'secret' => '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',
                ],
            ]);
        // Nombre de tu bucket de S3
        $bucketName = 'bucket-rh-ht';

        // Obtiene una lista de objetos en el bucket
        $result = $s3->listObjects(['Bucket' => $bucketName]);

        // Itera a través de los objetos para obtener sus nombres
        $archivos = [];
        foreach ($result['Contents'] as $objeto) {
            $archivos[] = $objeto['Key'];
        }

        return response()->json(['archivos' => $archivos]);
    }
}

