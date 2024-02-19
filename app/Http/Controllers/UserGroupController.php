<?php

namespace App\Http\Controllers;

use App\Services\UserGroupServiceI;
use App\Models\UserGroup;

class UserGroupController extends BaseController
{

    public function __construct(UserGroupServiceI $service, UserGroup $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function employees(string $id){

        try {
            $records = $this->service->employees($id);
            return response()->json([
                "success" => true,
                "message" => "Records fetched successfully.",
                "data" => $records
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => []
            ]);
        }

    }
}
