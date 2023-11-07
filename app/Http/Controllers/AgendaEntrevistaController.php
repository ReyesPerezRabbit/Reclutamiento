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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $texto = $request->input('texto');

            // Generar un nombre único para la carpeta
            // $nombreCarpeta = uniqid();

            // Subir el archivo a Amazon S3 dentro de la carpeta
            $s3 = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2', // Cambia la región según tu configuración
                'credentials' => [
                    'key'    => 'AKIAQDZGXXMNE6BWJ5VO',
                    'secret' => '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',
                ],
            ]);

            $bucketName = 'bucket-rh-ht'; // Reemplaza con el nombre de tu bucket S3

            // Generar el nombre del archivo en la carpeta
            $nombreArchivo = $texto . '/' . $file->getClientOriginalName();

            // Subir el archivo a Amazon S3
            $s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $nombreArchivo,
                'SourceFile' => $file,
            ]);

            // Guardar la URL del archivo en la base de datos
            $archivoUrl = $s3->getObjectUrl($bucketName, $nombreArchivo);

            entrevista::create([
                'texto' => $texto,
                'file' => $archivoUrl,
            ]);

            return "Archivo subido con éxito a Amazon S3 y registrado en la base de datos.";
        }

        return "No se ha enviado ningún archivo.";
    }
}

//     public function mostrarDatosS3()
//     {
//         // Llamar a la función para listar archivos S3 que ya tienes
//         $archivos = $this->listarArchivosS3();

//         // Recorrer la lista de archivos y obtener información adicional si es necesario
//         $archivosConInfo = [];
//         foreach ($archivos['archivos'] as $archivo) {
//             // Puedes realizar operaciones adicionales aquí si lo necesitas
//             $archivosConInfo[] = [
//                 'nombre' => $archivo,
//                 'otra_informacion' => 'Información adicional si es necesario',
//             ];
//         }

//         // Renderizar una vista con los datos
//         return view('components.entrevista', ['archivos' => $archivosConInfo]);
//     }
// }
