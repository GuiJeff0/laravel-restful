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


    // get all employee
    public function index()
    {
        try{
            $getAllEmployee = $this->repositoryInterface->getallemployee();
            return response()->json(['data' => $getAllEmployee]);
        } catch (\Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 500]);
        }
    }

    
    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'employeename' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string'             
            ]);

            $createTable = $this->repositoryInterface->store($data);
            return response()->json(['data' => $createTable]);
        } catch (\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }
    }

    public function show(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        try{
            $data = $request->validate([
                'employeename' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string'             
            ]);

            $updateEmployee = $this->repositoryInterface->updateemployee($id, $data);
            return response()->json(['data'=> $updateEmployee]);
        } catch (\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }
    }

   
    public function destroy(string $id)
    {   
        try{
            $deleteEmployee = $this->repositoryInterface->deleteemployee($id);
            return response()->json(['data'=> $deleteEmployee]);
        } catch (\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }
    }
}
