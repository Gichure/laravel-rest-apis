<?php


namespace App\Services;


/**
 *
 * @author Paul
 *
 */
interface BaseServiceI
{
    
    public function create(array $attributes);
    
    public function update($id, array $attributes);
    
    public function find(int $id);
    
    public function delete($id);
    
    public function all(array $attributes);
    
    public function count();
    
}