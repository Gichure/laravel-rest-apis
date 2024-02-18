<?php

namespace App\Http\Controllers;

use App\Services\TaskCategoryServiceI;
use App\Models\TaskCategory;

class TaskCategoryController extends BaseController
{
    
    public function __construct(TaskCategoryServiceI $service)
    {
        $this->service = $service;
    }
    
}
