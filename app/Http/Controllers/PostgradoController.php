<?php
namespace App\Http\Controllers;

use Validator;
use App\Models\Materia;
// use Barryvdh\DomPDF\PDF;
use PDF;
use App\Models\Postgrado;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use App\Models\MateriaPostgrado;
use Illuminate\Support\Facades\DB;

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
            DB::beginTransaction();
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
            $lastIdPostgrado = Postgrado::create(array_merge(
                $validator->validated()
            ))->idPostgrado;
            $materias = $request['materias'];
            foreach ($materias as $key => $value) {
                $lastIdMateria = Materia::create($value)->idMateria;
                MateriaPostgrado::create([
                    'materia_id' => $lastIdMateria,
                    'postgrado_id' => $lastIdPostgrado,
                ]);
                DB::commit();
            }
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
    // CUSTOM FUNCTIONS ****************************************************************
    public function postgrado_postgraduantes($idPostgrado)
    {
        $resultado = Inscripcion::select('postgraduantes.idPostgraduante', DB::raw("CONCAT(postgraduantes.paterno,' ',postgraduantes.materno,' ',postgraduantes.nombres) AS full_name"), DB::raw("CONCAT(postgraduantes.ci,'-',postgraduantes.ci_ext) AS cedula "), 'postgraduantes.celular', 'postgraduantes.profesion')->where('postgrado_id', '=', $idPostgrado)->join('postgraduantes', 'postgraduantes.idPostgraduante', '=', 'inscripciones.postgraduante_id')->get();
        return $resultado;
    }

    public function calificacionesAsignatura()
    {
        try {
            $result=Postgrado::all();
            // return  view('reporte_calificaciones_general', ['postgrados'=>$result]);
            $pdf = PDF::loadView('reporte_calificaciones_asignatura', array('postgrados' => $result));
            return $pdf->stream('calificaciones_asignatura.pdf');

        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function calificacionesPersonal()
    {
        try {
            $result=Postgrado::all();
            // return  view('reporte_calificaciones_general', ['postgrados'=>$result]);
            $pdf = PDF::loadView('reporte_calificaciones_personal', array('postgrados' => $result));
            return $pdf->stream('calificaciones_personal.pdf');

        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function pagosGeneral()
    {
        try {
            $result=Postgrado::all();
            // return  view('reporte_calificaciones_general', ['postgrados'=>$result]);
            $pdf = PDF::loadView('reporte_pagos_general', array('postgrados' => $result));
            $pdf->setPaper('legal', 'landscape');
            return $pdf->stream('pagos_postgrados.pdf');

        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function pagosPersonal()
    {
        try {
            $result=Postgrado::all();
            // return  view('reporte_calificaciones_general', ['postgrados'=>$result]);
            $pdf = PDF::loadView('reporte_pagos_personal', array('postgrados' => $result));
            return $pdf->stream('pagos_postgraduante.pdf');

        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
}
