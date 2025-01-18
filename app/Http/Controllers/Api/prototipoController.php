<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prototipo;
use Illuminate\Support\Facades\Validator;

class prototipoController extends Controller{
    public function index()
    {
        $prototipo = Prototipo::all();

       $data = [
            'message' => 'Listado de prototipos',
            'data' => $prototipo
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $prototipo = Prototipo::find($id);

        if(!$prototipo)
        {
            $data = [
                'message' => 'Prototipo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'data' => $prototipo,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Modelo' => 'required',
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

    public function destroy($id)
    {
        $prototipo = Prototipo::find($id);

        if(!$prototipo)
        {
            $data = [
                'message' => 'Prototipo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $prototipo->delete();

        $data = [
            'message' => 'Prototipo eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
       $prototipo = Prototipo::find($id);

       if(!$prototipo)
       {
           $data = [
               'message' => 'Prototipo no encontrado',
               'status' => 404
           ];
           return response()->json($data, 404);
       }

         $validator = Validator::make($request->all(), [
              'Serial' => 'required',
              'Modelo' => 'required',
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

         $prototipo->Serial = $request->Serial;
         $prototipo->Modelo = $request->Modelo;
         $prototipo->Categoria = $request->Categoria;
         $prototipo->Caracteristicas = $request->Caracteristicas;
         $prototipo->Observaciones = $request->Observaciones;

         $prototipo->save();

         $data = [
            'message' => 'Prototipo actualizado correctamente',
             'data' => $prototipo,
             'status' => 200
         ];

         return response()->json($data, 200);

    } 

    public function updatePartial(Request $request, $id)
    {
        $prototipo = Prototipo::find($id);

        if(!$prototipo)
        {
            $data = [
                'message' => 'Prototipo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Serial' => 'required',
            'Modelo' => 'required',
            'Categoria' => 'required|in:Prototipo,Herramienta,Componente',
            'Caracteristicas' => 'required',
            'Observaciones' => 'required',
        ]);

       if($validator->fails()){
        $data = [
            'message' => 'Error en la validación',
            'errors' => $validator->errors(),
            'status' => 400
        ];

        return response()->json($data, 400);
       }

       if ($request->has('Serial')) {
           $prototipo->Serial = $request->Serial;
       }

       if ($request->has('Modelo')) {
           $prototipo->Modelo = $request->Modelo;
       }

       if ($request->has('Categoria')) {
           $prototipo->Categoria = $request->Categoria;
       }   

       if ($request->has('Caracteristicas')) {
           $prototipo->Caracteristicas = $request->Caracteristicas;
       }    
       if ($request->has('Observaciones')) {
           $prototipo->Observaciones = $request->Observaciones;
       }
       $prototipo->save();

       $data = [
           'message' => 'Prototipo actualizado correctamente',
           'data' => $prototipo,
           'status' => 200
       ];
       return response()->json($data, 200); 
    }
}


