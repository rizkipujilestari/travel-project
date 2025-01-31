<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($message, $result = [], $code = 200)
    {
    	$response = [
            'status'  => $code,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, $code);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status'  => $code,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

}
