<?php
namespace App\Http\Controllers;
use App\Models\Inscripcion;
use App\Models\Postgraduante;
use App\Models\Postgrado;
use App\Models\Pago;
use Illuminate\Http\Request;
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
                $postgrado = Postgrado::where('idPostgrado','=',$value['postgrado_id'])->get()->first();
                $postgraduante = Postgraduante::where('idPostgraduante','=',$value['postgraduante_id'])->get()->first();
                $res_pagos=Pago::where('inscripcion_id','=',$value['idInscripcion'])->get();

                $inscripciones[] = (object) array(
                    'Inscripcion' => $value,
                    'Postgrado' => $postgrado,
                    'Postgraduante' => $postgraduante,
                    'Pagos' => $res_pagos,
                );
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
        try {
            $validator = Validator::make($request['postgraduante'], [
                'ci' => 'required|unique:postgraduantes',
                'celular' => 'required',
                'correo' => 'required|unique:postgraduantes',
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
                $res_inscripcion=[
                    'gestion'=>$request['gestion'],
                    'postgrado_id' =>$request['postgrado']['postgrado_id'],
                    'postgraduante_id' =>$lastId
                 ];
                $lastInscripcion=Inscripcion::create($res_inscripcion)->idInscripcion;
                if (sizeof($plan_pagos) > 0) {
                    foreach ($plan_pagos as $pago) {
                        $res_pagos = [
                            'item' => $pago['item'],
                            'costo_unitario' => $pago['costo_unitario'],
                            'boleta' => $pago['boleta'],
                            'fecha_cobro' => date('Y-m-d H:i:s'),
                            'observacion' => $pago['observacion'],
                            'inscripcion_id' => $lastInscripcion,
                            'postgrado_id' => $request['postgrado']['postgrado_id'],
                            'postgraduante_id' => $lastId
                        ];
                        Pago::create($res_pagos);
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Inscripcion registrado correctamente',
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
}
