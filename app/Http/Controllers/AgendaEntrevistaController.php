<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;

use Illuminate\Http\Request;

class AgendaEntrevistaController extends Controller
{
    public function cita()
    {
        return view('components.entrevista');
    }
    public function listarArchivosS3()
    {
        // Configura el cliente de AWS S3
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
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
    public function subirArchivoS3(Request $request)
    {
        // Configura el cliente de AWS S3
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
        // Nombre de tu bucket de S3
        $bucketName = 'bucket-rh-ht';

        // Verifica si se ha enviado un archivo
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');

            // Genera un nombre único para el archivo
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            // Sube el archivo al bucket de S3
            $s3->putObject([
                'Bucket' => $bucketName,
                'Key' => 'carpeta-destino/' . $nombreArchivo,
                'Body' => fopen($archivo->path(), 'rb'),
                'ACL' => 'public-read', // Opcional: establece permisos de acceso
            ]);

            return "Archivo subido con éxito a Amazon S3.";
        }

        return "No se ha enviado ningún archivo.";
    }
}
