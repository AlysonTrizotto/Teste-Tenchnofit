<?php

namespace App\Http\Controllers;

use App\Utils\ConstantsHTTPStatus;

abstract class Controller
{
    public function sendSuccessResponse($data, $message = null, $code = ConstantsHTTPStatus::OK) {
        return response()->json(['success' => TRUE,'data' => $data, 'message' => $message], $code);
    }

    public function sendErrorResponse($message = null, $code = ConstantsHTTPStatus::BAD_REQUEST) {
        return response()->json(['success' => FALSE,'message' => $message], $code);
    }
}
