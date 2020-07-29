<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TiposEspacio;

class TipoEspacioController extends Controller
{
    public function index()
    {
        $tiposespacios = TiposEspacio::paginate(15);
        return $tiposespacios;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_espacio' => 'required|string',
            

        ]);
        $tiposespacio = new TiposEspacio([
            'nombre_espacio' => $request->nombre_espacio,
            
    
        ]);
        $tiposespacio->save();
        return response()->json([
            'message' => 'Successfully created tipo de espacio', 'success' => true], 201);
    }

    public function show($id)
    {
        return response()->json(TiposEspacio::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_espacio' => 'required|string',

        ]);
        $tiposespacio = TiposEspacio::findOrFail($id);
        $tiposespacio->fill($request->all())->save();
        return response()->json(['message' => 'Tipo de espacio actualizado correctamente','status_code' => 201],201); 
    }

    public function destroy($id)
    {
        $tiposespacio = TiposEspacio::findOrFail($id);
        $tiposespacio->delete();
        return response()->json(['message' => 'Tipo Espacio eliminado correctamente','status_code' => 201],201); 
    }
}
