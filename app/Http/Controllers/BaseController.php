<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseServiceI;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{
    
    protected $service;
    
    public function __construct(BaseServiceI $service)
    {
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $records = $this->service->all($request->all());
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $record = $this->service->create($request->all());
            return response()->json([
                "success" => true,
                "message" => "Record saved successfully.",
                "data" => $record
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => []
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $record = $this->service->find($id);
            return response()->json([
                "success" => true,
                "message" => "Record fetched successfully.",
                "data" => $record
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => []
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $record = $this->service->update($id, $request->all());
            return response()->json([
                "success" => true,
                "message" => "Record updated successfully.",
                "data" => $record
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => []
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $record = $this->service->delete($id);
            return response()->json([
                "success" => true,
                "message" => "Record deleted successfully.",
                "data" => $record
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
