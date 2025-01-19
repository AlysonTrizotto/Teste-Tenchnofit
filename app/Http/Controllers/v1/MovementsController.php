<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Movement\IndexRequest;
use App\Http\Services\v1\MovementsServices;

class MovementsController extends Controller
{
    private $movementsServices;
    public function __construct()
    {
        $this->movementsServices = new MovementsServices();
    }

    public function index(IndexRequest $request) {
        try {
            return $this->sendSuccessResponse($this->movementsServices->index($request->search), 'Success on search personal records');
        } catch (\Exception $e) {
            return $this->sendErrorResponse($e->getMessage());
        }
    }
}
