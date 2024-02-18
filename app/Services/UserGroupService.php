<?php

namespace App\Services;
use App\Repositories\UserGroupRepository;

/**
 *
 * @author Paul
 *
 */
class UserGroupService extends BaseService implements UserGroupServiceI
{
    
    protected $repository;
    
    public function __construct(UserGroupRepository $repository)
    {
        $this->repository = $repository;
    }
   
}