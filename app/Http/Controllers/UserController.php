<?php

namespace App\Http\Controllers;

use App\Services\UserServiceI;
use App\Models\User;

class UserController extends BaseController
{
   
    public function __construct(UserServiceI $service, User $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
    
}
