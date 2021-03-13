<?php
namespace App\Http\Controllers;

use App\Models\DocenteMateria;
use App\Models\Inscripcion;
// use Barryvdh\DomPDF\PDF;
use App\Models\Postgrado;
use App\Models\Postgraduante;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Validator;

class PostgradoController extends Controller
{

    public function index()
    {
        try {
            $result = Postgrado::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de postgrados',
                    'status_code' => 200,
                ], 200);
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

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|unique:postgrados',
                'fecha_inicio' => 'required',
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
            DB::commit();
            // $lastIdPostgrado = Postgrado::create(array_merge(
            //     $validator->validated()
            // ))->idPostgrado;
            // $materias = $request['materias'];
            // foreach ($materias as $key => $value) {
            //     $lastIdMateria = Materia::create($value)->idMateria;
            //     MateriaPostgrado::create([
            //         'materia_id' => $lastIdMateria,
            //         'postgrado_id' => $lastIdPostgrado,
            //     ]);
            //     DB::commit();
            // }
            return response()->json([
                'success' => true,
                'message' => 'Postgrado registrado correctamente',
                'status_code' => 201,
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'funcion' => 'Postgrado Controller Store',
                'message' => $e->getMessage(),
            ], 404);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'funcion' => 'Postgrado Controller Store',
                'message' => $e->getMessage(),
            ], 404);
        }
        // try {

        // } catch (\Exception $ex) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $ex->getMessage(),
        //     ], 404);
        // }
    }

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

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'fecha_inicio' => 'required',
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
    // CUSTOM FUNCTIONS ****************************************************************
    public function postgrado_postgraduantes($idPostgrado)
    {
        $resultado = Inscripcion::select('postgraduantes.idPostgraduante', DB::raw("CONCAT(postgraduantes.paterno,' ',postgraduantes.materno,' ',postgraduantes.nombres) AS full_name"), DB::raw("CONCAT(postgraduantes.ci,'-',postgraduantes.ci_ext) AS cedula "), 'postgraduantes.celular', 'postgraduantes.profesion')->where('postgrado_id', '=', $idPostgrado)->join('postgraduantes', 'postgraduantes.idPostgraduante', '=', 'inscripciones.postgraduante_id')->get();
        return response()->json([
            'data' => $resultado,
            'success' => true,
            'total' => count($resultado),
            'message' => 'Lista de postgraduantes de Postgrado',
            'status_code' => 200,
        ], 200);
    }
    public function postgrado_docentes($idPostgrado)
    {
        $resultado = DocenteMateria::select(DB::raw("CONCAT(IFNULL(usuarios.paterno,''),' ',IFNULL(usuarios.materno,''),' ',IFNULL(usuarios.nombres,'')) AS full_name"), 'usuarios.idUsuario', 'usuarios.profesion','materias.idMateria','materias.nombre','materias.sigla')->join('usuarios', 'docente_materia.docente_id', '=', 'usuarios.idUsuario')->join('materias', 'docente_materia.materia_id', '=', 'materias.idMateria')->where('docente_materia.postgrado_id', '=', $idPostgrado)->get();
        return response()->json([
            'data' => $resultado,
            'success' => true,
            'total' => count($resultado),
            'message' => 'Lista de Docentes de Postgrado',
            'status_code' => 200,
        ], 200);
    }

    
}
