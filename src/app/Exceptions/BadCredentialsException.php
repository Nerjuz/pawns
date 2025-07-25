<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BadCredentialsException extends Exception
{
    protected $message = 'Bad credentials provided.';

    public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->message,
        ], 401);
    }
}
