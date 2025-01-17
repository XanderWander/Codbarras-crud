<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Componentes;

class componentesController extends Controller
{
    public function index()
    {
        $componente = Componentes::all();

        $data = [
            'message' => 'Listado de componentes',
            'data' => $componente
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $componente = Componentes::find($id);

        if(!$componente)
        {
            $data = [
                'message' => 'Componente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'data' => $componente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }	

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Caracteristicas' => 'required',
            'Observaciones'=> 'required',
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

        $componente = Componentes::create([
            'Serial' => $request->Serial,
            'Nombre' => $request->Nombre,
            'Categoria' => $request->Categoria,
            'Caracteristicas' => $request->Caracteristicas,
            'Observaciones' => $request->Observaciones
        ]);

        if(!$componente)
        {
            $data = [
                'message' => 'Error al crear el componente',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $componente,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $componente = Componentes::find($id);

        if(!$componente)
        {
            $data = [
                'message' => 'Componente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $componente->delete();

        $data = [
            'message' => 'Componente eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $componente = Componentes::find($id);

        if(!$componente)
        {
            $data = [
                'message' => 'Componente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Caracteristicas' => 'required',
            'Observaciones' => 'required',
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

        $componente->Serial = $request->Serial;
        $componente->Nombre = $request->Nombre;
        $componente->Categoria = $request->Categoria;
        $componente->Caracteristicas = $request->Caracteristicas;
        $componente->Observaciones = $request->Observaciones;

        if(!$componente->save())
        {
            $data = [
                'message' => 'Error al actualizar el componente',
                'data' => $componente,
                'status' => 200
            ];   
        }
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $componente = Componentes::find($id);
        if(!$componente)
        {
            $data = [
                'message' => 'Componente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Nombre' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Caracteristicas' => 'required',
            'Observaciones' => 'required',
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

        if ($request->has('Serial')) {
            $componente->Serial = $request->Serial;
        }

        if ($request->has('Nombre')) {
            $componente->Nombre = $request->Nombre;
        }

        if ($request->has('Categoria')) {
            $componente->Categoria = $request->Categoria;
        }

        if ($request->has('Caracteristicas')) {
            $componente->Caracteristicas = $request->Caracteristicas;
        }

        if ($request->has('Observaciones')) {
            $componente->Observaciones = $request->Observaciones;
        }

        $componente->save();

        $data = [
            'message' => 'Componente actualizado',
            'data' => $componente,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}

