<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $message)
    {
        // return Response::json(ResponseUtil::makeResponse($message, $result));
        return Response::json([
            'success' => true,
            'data'=>$result,
            'message' => $message
        ], 200);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json([
            'success' => false,
            'errors' => $error
        ], $code);
        // return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
