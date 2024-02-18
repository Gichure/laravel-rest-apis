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
    
    protected $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
   
}