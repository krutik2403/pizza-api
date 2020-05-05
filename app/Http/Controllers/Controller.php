<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($message = '', $data = null, $statusCode = 200)
    {
        return response()->json(['message' => $message, 'data' => $data], $statusCode);
    }

    public function sendError($message = '', $errors = null, $statusCode = 500)
    {
        return response()->json(['message' => $message, 'errors' => $errors], $statusCode);
    }
}
