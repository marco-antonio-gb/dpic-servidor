<?php

namespace App\Http\Controllers;

use App\Models\Postgrado;
use Illuminate\Http\Request;
use Validator;

class PostgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articlesConTags = Postgrado::with('materias')->get();
        // return $articlesConTags;
        try {
            $result = Postgrado::all();
            if (!$result->isEmpty()) {
                return response()->json([

                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de postgrados',
                    'status_code' => 200,
                ]);
            } else {
                return [
                    'success' => false,
                    'message' => 'No existen resultados',
                    'status_code' => 201,
                ];
            }
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|unique:postgrados',
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'cantidad_pagos' => 'required',
                'precio' => 'required',
                'gestion' => 'required',
                'nivel_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            }
            Postgrado::create(array_merge(
                $validator->validated()
            ));
            return response()->json([
                'success' => true,
                'message' => 'Postgrado registrado correctamente',
                'status_code' => 201,
            ], 201);

        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // $result = Postgrado::select('postgrados.idPostgrado','postgrados.nombre','postgrados.fecha_inicio','postgrados.cantidad_pagos','postgrados.precio','postgrados.gestion','niveles.nombre AS nivel','niveles.idNivel')->join('niveles','niveles.idNivel','=','postgrados.nivel_id')->where('idPostgrado', '=', $id)->get()->first();
            $postgrado = Postgrado::find($id);

            if ($postgrado) {
                $postgrado->materias;
                $postgrado->niveles;
                return [
                    'success' => true,
                    'data' => $postgrado,
                    'status_code' => 200,
                    // 'materias'=>$materias,
                    // 'nivel'=>$nivel

                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'No se encontro ningun registro',
                    'status_code' => 204,
                ];
            }
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'cantidad_pagos' => 'required',
                'precio' => 'required',
                'gestion' => 'required',
                'nivel_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_postgrado = [
                    'nombre' => $request['nombre'],
                    'fecha_inicio' => $request['fecha_inicio'],
                    'fecha_final' => $request['fecha_final'],
                    'cantidad_pagos' => $request['cantidad_pagos'],
                    'precio' => $request['precio'],
                    'gestion' => $request['gestion'],
                    'nivel_id' => $request['nivel_id'],

                ];
                Postgrado::where('idPostgrado', '=', $id)->update($res_postgrado);
                return response()->json([
                    'success' => true,
                    'message' => 'Postgrado Actualizado correctamente',
                ], 201);
            }

        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Postgrado::where('idPostgrado', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Postgrado eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
