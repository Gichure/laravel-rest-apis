<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeServiceI;

class EmployeeController extends BaseController
{
    public function __construct(EmployeeServiceI $service, Employee $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function employees(string $id){

        try {
            $records = $this->service->tasks($id);
            return response()->json([
                "success" => true,
                "message" => "Records fetch successfully.",
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
