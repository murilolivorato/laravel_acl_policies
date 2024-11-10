<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function successResponse($data = null, $code = Response::HTTP_OK)
    {
        return response()->json($data, $code);
    }

    public function errorResponse($errors, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        if (is_string($errors)) {
            return response()->json([
                'message' => $errors,
                'status' => $statusCode
            ], $statusCode);
        }

        return response()->json([
            'errors' => $errors
        ]);
    }
}
