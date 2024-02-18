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
}
