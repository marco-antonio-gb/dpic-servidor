<?php
namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Inscripcion;
use App\Models\Pago;
use App\Models\Postgraduante;
use App\Models\DocenteMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class InscripcionController extends Controller
{
    public function index()
    {
        // return Inscripcion::all();
        try {
            // $inscripcion_result = Inscripcion::with('postgraduantes', 'postgrados','pagos')->get();
            $inscripcion_result = Inscripcion::all();
            foreach ($inscripcion_result as $key => $value) {
                // $postgrado = Postgrado::select('idPostgrado','nombre')->where('idPostgrado','=',$value['postgrado_id'])->get()->first();
                // $postgraduante = Postgraduante::select('idPostgraduante',DB::raw("CONCAT(paterno,' ',materno,' ',nombres) AS full_name"),'ci','ci_ext')->where('idPostgraduante','=',$value['postgraduante_id'])->get()->first();
                // $res_pagos=Pago::where('inscripcion_id','=',$value['idInscripcion'])->get();
                $resultado = Inscripcion::select('inscripciones.idInscripcion', 'inscripciones.gestion', 'postgrados.idPostgrado', 'postgrados.nombre', 'postgraduantes.idPostgraduante', DB::raw("CONCAT(postgraduantes.paterno,' ',postgraduantes.materno,' ',postgraduantes.nombres) AS full_name"), 'postgraduantes.ci', 'postgraduantes.ci_ext')->join('postgrados', 'postgrados.idPostgrado', '=', 'inscripciones.postgrado_id')->join('postgraduantes', 'postgraduantes.idPostgraduante', '=', 'inscripciones.postgraduante_id')->where('inscripciones.postgrado_id', '=', $value['postgrado_id'])->where('inscripciones.postgraduante_id', '=', $value['postgraduante_id'])->get()->first();
                $inscripciones[] =
                    $resultado;
                // 'Inscripcion' => $value,
                // 'Postgrado' => $postgrado,
                // 'Postgraduante' => $postgraduante,
                // 'Pagos' => $res_pagos,
            }
            if (!$inscripcion_result->isEmpty()) {
                return response()->json([
                    'data' => $inscripciones,
                    'success' => true,
                    'total' => count($inscripciones),
                    'message' => 'Lista de inscripciones',
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
    public function store(Request $request)
    {
        $plan_pagos = $request['pagos'];
        $postgrado_id = $request['postgrado_id'];
        try {
            DB::beginTransaction();
            $validator = Validator::make($request['postgraduante'], [
                'ci' => 'required|unique:postgraduantes',
                'celular' => 'required',
                'correo' => 'required|unique:postgraduantes|email',
                'nombres' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_postgraduante = [
                    'paterno' => $request['postgraduante']['paterno'],
                    'materno' => $request['postgraduante']['materno'],
                    'nombres' => $request['postgraduante']['nombres'],
                    'lugar_nac' => $request['postgraduante']['lugar_nac'],
                    'ci' => $request['postgraduante']['ci'],
                    'ci_ext' => $request['postgraduante']['ci_ext'],
                    'celular' => $request['postgraduante']['celular'],
                    'telf_domicilio' => $request['postgraduante']['telf_domicilio'],
                    'profesion' => $request['postgraduante']['profesion'],
                    'correo' => $request['postgraduante']['correo'],
                ];
                $lastId = Postgraduante::create($res_postgraduante)->idPostgraduante;
                $res_inscripcion = [
                    'gestion' => $request['gestion'],
                    'postgrado_id' => $postgrado_id,
                    'postgraduante_id' => $lastId,
                ];
                $lastInscripcion = Inscripcion::create($res_inscripcion)->idInscripcion;
                $docentes = DocenteMateria::select('materia_id', 'docente_id')->where('postgrado_id', '=', $postgrado_id)->get();
                foreach ($docentes as $key => $value) {
                    $calificaciones_res = Calificacion::create([
                        'nota_numerica' => 0,
                        'nota_literal' => 'CERO',
                        'materia_id' => $value->materia_id,
                        'docente_id' => $value->docente_id,
                        'postgrado_id' => $postgrado_id,
                        'postgraduante_id' => $lastId,
                    ]);
                }

                if (sizeof($plan_pagos) > 0) {
                    foreach ($plan_pagos as $pago) {
                        $res_pagos = [
                            'item' => $pago['item'],
                            'costo_unitario' => $pago['costo_unitario'],
                            'boleta' => $pago['boleta'],
                            'fecha_cobro' => date('Y-m-d H:i:s'),
                            'observacion' => $pago['observacion'],
                            'postgrado_id' => $postgrado_id,
                            'postgraduante_id' => $lastId,
                        ];
                        Pago::create($res_pagos);
                    }
                }
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Inscripcion registrado correctamente',
                    'status_code' => 201,
                ], 201);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
    public function show(Inscripcion $inscripcion)
    {
        //
    }
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }
    public function destroy(Inscripcion $inscripcion)
    {
        //
    }

    // CUSTOMS FUNCTIONSSSSSSSSSSSSSSS*************************
    public function storeexists(Request $request)
    {
        $plan_pagos = $request['pagos'];
        $postgrado_id = $request['postgrado_id'];
        $postgraduante_id = $request['postgraduante_id'];
        try {
            DB::beginTransaction();
            $res_inscripcion = [
                'gestion' => $request['gestion'],
                // 'fecha_registro'=>$request['fecha_registro'],
                'postgrado_id' => $postgrado_id,
                'postgraduante_id' => $postgraduante_id,
            ];
            $lastInscripcion = Inscripcion::create($res_inscripcion)->idInscripcion;
            if (sizeof($plan_pagos) > 0) {
                foreach ($plan_pagos as $pago) {
                    $res_pagos = [
                        'item' => $pago['item'],
                        'costo_unitario' => $pago['costo_unitario'],
                        'boleta' => $pago['boleta'],
                        'fecha_cobro' => date('Y-m-d H:i:s'),
                        'observacion' => $pago['observacion'],
                        'postgrado_id' => $postgrado_id,
                        'postgraduante_id' => $postgraduante_id,
                    ];
                    Pago::create($res_pagos);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Inscripcion registrado correctamente',
                'status_code' => 201,
            ], 201);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
