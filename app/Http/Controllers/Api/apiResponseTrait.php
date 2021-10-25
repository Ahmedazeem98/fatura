<?php

namespace App\Http\Controllers\Api;

trait apiResponseTrait
{
    public function apiResponse($data = null,$error = null, $code = 200)
    {
        $array = [
          'data' => $data,
            'status' => $code >= 200 && $code < 300,
            'error' => $error
        ];

        return response($array, $code);
    }

    public function notFoundResponse()
    {
        return $this->apiResponse(null, 'Post not found', 404);
    }
}
