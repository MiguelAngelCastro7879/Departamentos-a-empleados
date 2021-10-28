<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    
    public function all(){
        return Employee::all();
    }
    public function create(Request $request){
        $employee = Employee::create([
            'nombre'=>$request->nombre,
            'correo'=>$request->correo,
            'password'=>$request->password,
            'celular'=>$request->celular,
            'since_id'=>$request->puesto,
            'departament_id'=>$request->departamento    
        ]);
        return response()->json([
            'mensaje' => 'Usuario guardado perfectamente',
            'trabajador' => $employee 
        ]);
        
    }
    public function read($id){
        $employee = Employee::find($id);
        return response()->json([
            'mensaje' => 'Usuario elegido',
            'trabajador' => $employee 
        ],200);
    }
    public function read_esp(){
        
    }

    public function update($id,Request $request){
        $empleado = Employee::find($id);
        $empleado->celular=$request->telefono;
        $empleado->save();
        return response()->json([
            'mensaje' => 'empleado actualziado',
            'empleado' => $empleado 
        ],200);
        
    }
    public function delete($id){
        $empleado = Employee::find($id);
        $empleado->delete();
        return response()->json([
            'mensaje' => 'empleado borrado',
            'empleado' => $empleado 
        ],200);
        
    }
}
