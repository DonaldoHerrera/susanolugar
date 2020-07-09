<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;

class VehiculosController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::paginate(15);
        return $vehiculos;
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required',
            'placas'     => 'required|string',
            'num_economico'    => 'required|string',
            'nombre_vehiculo' => 'required|string|',
            'tipo_vehiculo' => 'required|string|',

        ]);
        $vehiculo = new Vehiculo([
            'empresa_id' => $request->empresa_id,
            'placas'     => $request->placas,
            'num_economico' => $request->num_economico,
            'nombre_vehiculo' => $request->nombre_vehiculo,
            'tipo_vehiculo' => $request->tipo_vehiculo,
    
        ]);
        $vehiculo->save();
        return response()->json([
            'message' => 'Successfully created vehiculo!', 'success' => true], 201);
    }

    public function show($id)
    {
        return response()->json(Vehiculo::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'placas'     => 'required|string',
            'num_economico'    => 'required|string',
            'nombre_vehiculo' => 'required|string|',
            'tipo_vehiculo' => 'required|string|',

        ]);
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->fill($request->all())->save();
        return response()->json(['message' => 'Vehiculo actualizado correctamente','status_code' => 201],201); 
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return response()->json(['message' => 'Vehiculo eliminado correctamente','status_code' => 201],201); 
    }
}
