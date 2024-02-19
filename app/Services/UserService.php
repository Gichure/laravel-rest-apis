<?php

namespace App\Services;
use App\Repositories\UserRepository;

/**
 *
 * @author Paul
 *
 */
class UserService extends BaseService implements UserServiceI
{
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
   
}