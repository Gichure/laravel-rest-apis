<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceI;
use App\Models\Task;

class TaskController extends BaseController
{
    public function __construct(TaskServiceI $service, Task $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
}
