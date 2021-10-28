<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Since;

class SincesController extends Controller
{
    
    public function all(){
        return Since::all();
    }
    public function create(Request $request){
        $puesto = Since::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);
        return response()->json([
            'mensaje' => 'puesto guardado perfectamente',
            'puesto' => $puesto
        ]);
        
    }
    public function read_esp(){
        
    }
    public function read($id){
        $puesto = Since::find($id);
        return response()->json([
            'mensaje' => 'puesto elegido',
            'puesto' => $puesto
        ],200);
    }

    public function update($id,Request $request){
        $puesto = Since::find($id);
        $puesto->descripcion=$request->descripcion;
        $puesto->save();
        return response()->json([
            'mensaje' => 'puesto actualziado',
            'puesto' => $puesto 
        ],200);
        
    }
    public function delete($id){
        $puesto = Since::find($id);
        $puesto->delete();
        return response()->json([
            'mensaje' => 'puesto borrado',
            'puesto' => $puesto 
        ],200);
        
    }
}
