<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\MateriaPostgrado;
use Illuminate\Http\Request;
use Validator;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $articlesConTags = Materia::with('postgrados')->get();
        // return $articlesConTags;
        try {
            $result = Materia::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de materias',
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

        // return $request;
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required | unique:materias',
                'sigla' => 'required | unique:materias',
                // 'descripcion' => 'required',
                'credito' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $lastMateria=Materia::create(array_merge(
                    $validator->validated()
                ))->idMateria;
                
            
                $postgrado_res=[
                    'materia_id'=>$lastMateria,
                    'postgrado_id'=>$request['postgrado_id']
                ];
                MateriaPostgrado::create($postgrado_res);
                return response()->json([
                    'success' => true,
                    'message' => 'Materia registrado correctamente',
                    'status_code' => 201,
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
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Materia::where('idMateria', '=', $id)->get()->first();
            $result->postgrados;
            if ($result) {
                return [
                    'success' => true,
                    'data' => $result,
                    'status_code' => 200,
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
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'sigla' => 'required',
                // 'descripcion' => 'required',
                'credito' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_materia = [
                    'nombre' => $request['nombre'],
                    'sigla' => $request['sigla'],
                    'descripcion' => $request['descripcion'],
                    'credito' => $request['credito'],
                ];
                Materia::where('idMateria', '=', $id)->update($res_materia);
                return response()->json([
                    'success' => true,
                    'message' => 'Materia actualizada correctamente',
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
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        try {
            Materia::where('idMateria', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Materia eliminada correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
