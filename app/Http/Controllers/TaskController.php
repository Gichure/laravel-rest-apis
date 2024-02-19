<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceI;
use App\Services\TaskActivityServiceI;
use App\Models\Task;

class TaskController extends BaseController
{

    private $taskActivityService;

    public function __construct(TaskServiceI $service, TaskActivityServiceI $taskActivityService, Task $model)
    {
        $this->service = $service;
        $this->taskActivityService = $taskActivityService;
        $this->model = $model;
    }

    public function activities(string $id){

        try {
            $records = $this->taskActivityService->all(['task_id' => $id]);
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
