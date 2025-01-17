<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prototipo;
use Illuminate\Support\Facades\Validator;

class protitpoController extends Controller
{
    function index()
    {
        $prototipo = Prototipo::all();

       $data = [
            'message' => 'Listado de prototipos',
            'data' => $prototipo
        ];

        return response()->json($data, 200);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Modelo' => 'required',
            'Categoria' => 'required',
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

        $prototipo = Prototipo::create([
            'Serial' => $request->Serial,
            'Modelo' => $request->Modelo,
            'Categoria' => $request->Categoria,
            'Caracteristicas' => $request->Caracteristicas,
            'Observaciones' => $request->Observaciones,
        ]);

        if(!$prototipo)
        {
            $data = [
                'message' => 'Error al crear el prototipo',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'data' => $prototipo,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
}
