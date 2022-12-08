<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successMessage($message, $data)
    {
        return [
            'message' => $message,
            'data' => $data,
            'code' => 200
        ];

        return response()->json([], $code = 200);
        // 200 exito
        // 500 error no controlado
        // 400 no encontrado
        // 404 recurso no encontrado
        // 422 validaciones
    }
}
