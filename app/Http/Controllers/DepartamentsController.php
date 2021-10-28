<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;

class DepartamentsController extends Controller
{
    public function create(Request $request){
        $departamento = Departament::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'telefono'=>$request->telefono
        ]);
        return response()->json([
            'mensaje' => 'Departamento guardado perfectamente',
            'departamento' => $departamento
        ]);
        
    }
    public function all(){
        return Departament::all();
    }
    public function read($id){
        $departamento = Departament::find($id);
        return response()->json([
            'mensaje' => 'Departamento elegido',
            'departamento' => $departamento 
        ],200);
    }
    public function read_esp(){
        $departamento = Departament::select('departaments.nombre','employees.nombre as empleados')
        ->join('employees',
                'employees.departament_id',
                '=',
                'departamento.id')->get();
        
    }
    public function update($id,Request $request){
        $departamento = Departament::find($id);
        $departamento->telefono=$request->telefono;
        $departamento->save();
        return response()->json([
            'mensaje' => 'Departamento actualziado',
            'departamento' => $departamento 
        ],200);
        
    }
    public function delete($id){
        $departamento = Departament::find($id);
        $departamento->delete();
        return response()->json([
            'mensaje' => 'Departamento borrado',
            'departamento' => $departamento 
        ],200);
        
    }
}
