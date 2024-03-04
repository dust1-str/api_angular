<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Illuminate\Support\Facades\Validator;

class EquiposController extends Controller
{
 
    public function index()
    {
        $equipos = Equipo::select('id', 'nombre', 'apodo', 'fundacion')->get();
        return response()->json($equipos);
    }    

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|min:5',
            'apodo' => 'required|string|min:4',
            'fundacion' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['errores' => $validator->errors],421);
        }

        $equipo = Equipo::create([
            'nombre' => $request->nombre,
            'apodo' => $request->apodo,
            'fundacion' => $request->fundacion,
        ]);

        return response() -> json(['Insertado Correctamente'],201);
    }

    public function destroy($id=null, Request $request){
        $equipo = Equipo::find($id);
        if(!$equipo){
            return response() -> json(['Equipo no encontrado', 404]);
        }

        $equipo->delete();
        return response()->json(['message' => 'Equipo eliminado']);

    }

    public function update($id=null, Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|min:5',
            'apodo' => 'required|string|min:4',
            'fundacion' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['errores' => $validator->errors()],421);
        }

        $equipo = Equipo::find($id);

        if(!$equipo){
            return response() -> json(['Equipo no encontrado', 404]);
        }

        $equipo->nombre = $request->nombre;
        $equipo->apodo = $request->apodo;
        $equipo->fundacion = $request->fundacion;
        $equipo->save();
        return response() -> json([$equipo, 201]);
    }
}
