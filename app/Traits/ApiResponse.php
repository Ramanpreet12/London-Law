<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    protected function successResponse($data, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }
    protected function errorResponse($message, $code): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => null
        ], $code);
    }
    protected function validationErrorResponse($errors): JsonResponse
    {
        return response()->json([
            'status' => 'Validation Error',
            'message' => 'The given data was invalid.',
            'errors' => $errors
        ], 422);
    }
    protected function forbiddenResponse($message = 'Access Denied'): JsonResponse
    {
        return response()->json([
            'status' => 'Forbidden',
            'message' => $message
        ], 403);
    }
    
}