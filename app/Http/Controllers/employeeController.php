<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Exception;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function employeeRead() {
         
        $employees = employee::all();
        return response()->json(['employees'=>$employees]);
    }

   public function addEmployee(Request $request) {
      try{
        $insertEmployee = employee::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,        
        ]);
          return response()->json(['message'=>'Employee Added Successfully'],200);
    }
     catch(Exception $e) {
          return response()->json(['message'=>'Failed to Add'.$e->getMessage()],400);
     }

    }
    function employee_view(Request $request){
        return Employee::find($request->id);
    } 

    function employee_delete(Request $request){
        $delete =  Employee::destroy($request->id);
        if($delete){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record deleted succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record deleted failed!'
            ];
            return $response;
        }
    } 

    function employee_edit(Request $request){
        $update = [
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $edit = Employee::where('id', $request->employee_id)->update($update);
        if($edit){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record updated succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record updated failed!'
            ];
            return $response;
        }
    } 

    function employee_list(){
        return Employee::all();
    } 


} 
