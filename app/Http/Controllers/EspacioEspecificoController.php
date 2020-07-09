<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EspacioEspecifico;

class EspacioEspecificoController extends Controller
{
    public function index()
    {
        $espacioespecificos = EspacioEspecifico::paginate(15);
        return $espacioespecificos;
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required',
            'nombre_espacio'     => 'required|string',
            'tipo_espacio_id'    => 'required',
            'desc_espacio'    => 'required|',

        ]);
        $espacioespecifico = new EspacioEspecifico([
            'empresa_id' => $request->empresa_id,
            'nombre_espacio'     => $request->nombre_espacio,
            'tipo_espacio_id'    => $request->tipo_espacio_id,
            'desc_espacio' => $request->desc_espacio,
    
        ]);
        $espacioespecifico->save();
        return response()->json([
            'message' => 'Se ha creado un espacio especifico!', 'success' => true], 201);
    }

    public function show($id)
    {
        return response()->json(EspacioEspecifico::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_espacio'     => 'required|string',
            'tipo_espacio_id'    => 'required',
            'desc_espacio'    => 'required|',

        ]);
        $espacioespecifico = EspacioEspecifico::findOrFail($id);
        $espacioespecifico->fill($request->all())->save();
        return response()->json(['message' => 'Espacio Especifico actualizado correctamente','status_code' => 201],201); 
    }

    public function destroy($id)
    {
        $espacioespecifico = EspacioEspecifico::findOrFail($id);
        $espacioespecifico->delete();
        return response()->json(['message' => 'Espacio Especifico eliminado correctamente','status_code' => 201],201); 
    }
}
