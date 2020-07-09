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
            'cuarto' => 'required|string',
            'salon'     => 'required|string',
            'oficina'    => 'required|string',
            'laboratorio'    => 'required|string',
            'bodega' => 'required|string|',
            'otro' => 'required|string|',

        ]);
        $tiposespacio = new TiposEspacio([
            'cuarto' => $request->cuarto,
            'salon'     => $request->salon,
            'oficina'    => $request->oficina,
            'laboratorio' => $request->laboratorio,
            'bodega' => $request->bodega,
            'otro' => $request->otro,
    
        ]);
        $tiposespacio->save();
        return response()->json([
            'message' => 'Successfully created tipo de espacio!', 'success' => true], 201);
    }

    public function show($id)
    {
        return response()->json(TiposEspacio::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cuarto' => 'required|string',
            'salon'     => 'required|string',
            'oficina'    => 'required|string',
            'laboratorio'    => 'required|string',
            'bodega' => 'required|string|',
            'otro' => 'required|string|',

        ]);
        $tiposespacio = TiposEspacio::findOrFail($id);
        $tiposespacio->fill($request->all())->save();
        return response()->json(['message' => 'Tipo de espacio actualizado correctamente','status_code' => 201],201); 
    }

    public function destroy($id)
    {
        $tiposespacio = TiposEspacio::findOrFail($id);
        $tiposespacio->delete();
        return response()->json(['message' => 'Vehiculo eliminado correctamente','status_code' => 201],201); 
    }
}
