<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;


/**
 *
 * @author Paul
 *
 */
class BaseRepository
{
    
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function create($attributes)
    {
        return $this->model->create($attributes);
    }
    
    public function all(array $attributes)
    {
        return $this->model->where($attributes)->get();
    }
    
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function update($id, array $attributes)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }
    
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
    
    public function count($attributes)
    {
            return $this->model->where($attributes)->count();
    }
    
    public function first()
    {
        return $this->model->first();
    }
}