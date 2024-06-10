<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeRepository\EmployeeInterface;


class EmployeeController extends Controller
{

    protected $repositoryInterface;
    
    public function __construct(EmployeeInterface $repositoryInterface){
        $this->repositoryInterface = $repositoryInterface;
    }


    public function index()
    {
        
    }

    
    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'employeename' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string'             
            ]);

            $createtable = $this->repositoryInterface->store($data);
            return response()->json(['data' => $createtable]);
        } catch (\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }
    }

    public function show(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }
}
