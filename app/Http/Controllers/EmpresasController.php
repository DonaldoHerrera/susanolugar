<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::paginate(15);
        return $empresas;
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nombre_emp'     => 'required|string',
            'descripcion_emp'    => 'required',
            'sitio_web'    => 'required|string',
            'facebook' => 'required|string|',
            'instagram' => 'required|string|',
            'twitter' => 'required|string|',
            'latitud' => 'required',
            'longitud' => 'required',
            'tipo_empresa' => 'required|string|',

        ]);
        $empresa = new Empresa([
            'user_id' => $request->user_id,
            'nombre_emp'     => $request->nombre_emp,
            'descripcion_emp'    => $request->descripcion_emp,
            'sitio_web' => $request->sitio_web,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'tipo_empresa' => $request->tipo_empresa,
        ]);
        $empresa->save();
        return response()->json([
            'message' => 'Se ha creado una empresa!', 'success' => true], 201);
    }

    public function show($id)
    {
        return response()->json(Empresa::findOrFail($id));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_emp'     => 'required|string',
            'descripcion_emp'    => 'required',
            'sitio_web'    => 'required|string',
            'facebook' => 'required|string|',
            'instagram' => 'required|string|',
            'twitter' => 'required|string|',
            'latitud' => 'required',
            'longitud' => 'required',
            'tipo_empresa' => 'required|string|',

        ]);
        $empresa = Empresa::findOrFail($id);
        $empresa->fill($request->all())->save();
        return response()->json(['message' => 'Empresa actualizada correctamente','status_code' => 201],201); 
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return response()->json(['message' => 'Empresa eliminada correctamente','status_code' => 201],201); 
    }
}
