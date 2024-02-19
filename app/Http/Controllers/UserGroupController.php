<?php

namespace App\Http\Controllers;

use App\Services\UserGroupServiceI;
use App\Models\UserGroup;

class UserGroupController extends BaseController
{

    private $employeeService;

    public function __construct(UserGroupServiceI $service, EmployeeServiceI $employeeService, UserGroup $model)
    {
        $this->service = $service;
        $this->employeeService = $employeeService;
        $this->model = $model;
    }

    public function employees(string $id){

        try {
            $records = $this->employeeService->all(['user_group_id' => $id]);
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
