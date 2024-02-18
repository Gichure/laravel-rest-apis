<?php

namespace App\Http\Controllers;

use App\Services\TaskActivityServiceI;
use App\Models\TaskActivity;

class TaskActivityController extends BaseController
{
    public function __construct(TaskActivityServiceI $service, TaskActivity $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
