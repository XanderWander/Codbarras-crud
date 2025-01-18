<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\herramientas;
use Illuminate\Support\Facades\Validator;

class herramientasController extends Controller
{
    public function index()
    {
        $herramienta = herramientas::all();

        $data = [
            'message' => 'Listado de herramientas',
            'data' => $herramienta
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $herramienta = herramientas::find($id);

        if(!$herramienta)
        {
            $data = [
                'message' => 'Herramienta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'data' => $herramienta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Descripcion' => 'required'
        ]);

        if($validator->fails())
        { 
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $herramienta = herramientas::create([
            'Nombre' => $request->Nombre,
            'Categoria' => $request->Categoria,
            'Descripcion' => $request->Descripcion
        ]);

        if(!$herramienta)
        {
            $data = [
                'message' => 'Error al crear la herramienta',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Herramienta creada',
            'data' => $herramienta,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $herramienta = herramientas::find($id);

        if(!$herramienta)
        {
            $data = [
                'message' => 'Herramienta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $herramienta->delete();

        $data = [
            'message' => 'Herramienta eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function update(Request $request, $id)
    {
        $herramienta = herramientas::find($id);

        if(!$herramienta)
        {
            $data = [
                'message' => 'Herramienta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Descripcion' => 'required'
        ]);

        if($validator->fails())
        { 
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $herramienta->Nombre = $request->Nombre;
        $herramienta->Categoria = $request->Categoria;
        $herramienta->Descripcion = $request->Descripcion;

        $herramienta->save();

        $data = [
            'message' => 'Herramienta actualizada',
            'data' => $herramienta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $herramienta = herramientas::find($id);

        if(!$herramienta)
        {
            $data = [
                'message' => 'Herramienta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Descripcion' => 'required'
        ]);

        if($validator->fails())
        { 
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('Nombre'))
        {
            $herramienta->Nombre = $request->Nombre;
        }

        if($request->has('Categoria'))
        {
            $herramienta->Categoria = $request->Categoria;
        }

        if($request->has('Descripcion'))
        {
            $herramienta->Descripcion = $request->Descripcion;
        }

        $herramienta->save();

        $data = [
            'message' => 'Herramienta actualizada',
            'data' => $herramienta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
