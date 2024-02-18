<?php

namespace App\Services;
use App\Repositories\BaseRepository;

/**
 *
 * @author Paul
 *
 */
class BaseService implements BaseServiceI
{
    
    protected $repository;
    
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function all(array $attributes)
    {
        return $this->repository->all($attributes);
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }
    
    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }
    
    public function update($id, array $attributes)
    {
        $this->repository->update($id, $attributes);
        return $this->repository->find($id);
    }
    
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    
    public function count()
    {
        return $this->repository->count();
    }
}