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
}
