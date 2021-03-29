<?php
namespace App\Http\Controllers;
use App\Models\Pago;
use App\Models\Postgrado;
use App\Models\Postgraduante;
use App\Rules\ValidPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Pago::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de Pagos',
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
            foreach ($request['pagos'] as $key => $value) {
                Pago::create([
                    'item' => $value['item'],
                    'costo_unitario' => $value['costo_unitario'],
                    'boleta' => $value['boleta'],
                    'postgrado_id' => $request['postgrado_id'],
                    'postgraduante_id' => $request['postgraduante_id'],
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Pago registrado correctamente',
                'status_code' => 201,
            ], 201);
            // $validator = Validator::make($request['pagos'], [
            //     'item' => 'required',
            //     'costo_unitario' => new ValidPago,
            //     'boleta' => 'required|unique:pagos',
            // ]);
            // if ($validator->fails()) {
            //     return response()->json([
            //         'success' => false,
            //         'validator' => $validator->errors()->all(),
            //         'status_code' => 400,
            //     ]);
            // } else {
            //     foreach ($request['pagos'] as $key => $value) {
            //         Pago::create([
            //             'item'=>$value['item'],
            //             'costo_unitario'=>$value['costo_unitario'],
            //             'boleta'=>$value['boleta'],
            //             'postgrado_id'=>$request['postgrado_id'],
            //             'postgraduante_id'=>$request['postgraduante_id']
            //         ]);
            //     }
            //     return response()->json([
            //         'success' => true,
            //         'message' => 'Pago registrado correctamente',
            //         'status_code' => 201,
            //     ], 201);
            // }
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
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Pago::where('idPago', '=', $id)->get()->first();
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
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'item' => 'required',
                'costo_unitario' => new ValidPago,
                'fecha_cobro' => 'required',
                'postgrado_id' => 'required',
                'postgraduante_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_rol = [
                    'item' => $request['item'],
                    'costo_unitario' => $request['costo_unitario'],
                    'boleta' => $request['boleta'],
                    'fecha_cobro' => $request['fecha_cobro'],
                    'observacion' => $request['observacion'],
                    'postgrado_id' => $request['postgrado_id'],
                    'postgraduante_id' => $request['postgraduante_id'],
                ];
                Pago::where('idPago', '=', $id)->update($res_rol);
                return response()->json([
                    'success' => true,
                    'message' => 'Pago actualizado correctamente',
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
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Pago::where('idPago', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Pago eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
    // ********************************************************************************
    # RETORNA LOS PAGOS POR POSTGRADOS
    public function pagosPostgrados($idPostgrado)
    {
        try {
            $postrado_res = Postgrado::find($idPostgrado);
            $postgruantes_pagos = Pago::select('postgraduante_id')
                ->where('postgrado_id', '=', $idPostgrado)
                ->groupBy('postgraduante_id')
                ->get();
            // return $postgruantes_pagos;
            foreach ($postgruantes_pagos as $pago) {
                $postraduante_res = Postgraduante::select('idPostgraduante', DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $pago->postgraduante_id)->get()->first();
                $pagos_res = Pago::select('idPago', 'boleta', 'costo_unitario', 'item', 'fecha_cobro', 'postgraduante_id')
                    ->join('postgraduantes', 'pagos.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                    ->join('postgrados', 'pagos.postgrado_id', '=', 'postgrados.idPostgrado')
                    ->where('pagos.postgrado_id', '=', $idPostgrado)
                    ->where('pagos.postgraduante_id', '=', $postraduante_res->idPostgraduante)
                    ->get();
                $reporte_pagos[] = (object) array(
                    'idPostgraduante' => $postraduante_res->idPostgraduante,
                    'postgraduante' => $postraduante_res->full_name,
                    'pagos' => $pagos_res,
                    'total_pagos' => number_format($pagos_res->sum('costo_unitario'), 2, ',', '.') . '[Bs.]',
                    'cantidad_pagos' => count($postgruantes_pagos),
                    'size' => sizeof($pagos_res),
                );
            }
            if (!$postgruantes_pagos->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'postgrado' => $postrado_res->nombre,
                    'cantidad_pagos' => $postrado_res->cantidad_pagos,
                    'pagos_postgrado' => $reporte_pagos,
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
    public function verificarPagoPostgraduante($idPostgrado, $idPostgraduante)
    {
        try {   $postgrado_res = Postgrado::find($idPostgrado);
                $postgraduante_res = Postgraduante::select('idPostgraduante', DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $idPostgraduante)->first();
                $pagos_res = Pago::select('idPago', 'boleta', 'costo_unitario', 'item', 'fecha_cobro', 'postgraduante_id','observacion')
                    ->join('postgraduantes', 'pagos.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                    ->join('postgrados', 'pagos.postgrado_id', '=', 'postgrados.idPostgrado')
                    ->where('pagos.postgrado_id', '=', $idPostgrado)
                    ->where('pagos.postgraduante_id', '=', $idPostgraduante)
                    ->orderBy('pagos.created_at','desc')
                    ->get();
                $reporte_pagos = (object) array(
                    'postgrado'=>$postgrado_res->nombre,
                    'postgrado_gestion'=>$postgrado_res->gestion,
                    'postgraduante'=>$postgraduante_res,
                    'pagos' => $pagos_res,
                    'total_pagos' => number_format($pagos_res->sum('costo_unitario'), 2, ',', '.') . '[Bs.]',
                    'size' => sizeof($pagos_res),
                );
            if (!$pagos_res->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'data' => $reporte_pagos,
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
}
