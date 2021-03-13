<?php

namespace App\Http\Controllers;

use App\Models\Pago;
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
                    'item'=>$value['item'],
                    'costo_unitario'=>$value['costo_unitario'],
                    'boleta'=>$value['boleta'],
                    'postgrado_id'=>$request['postgrado_id'],
                    'postgraduante_id'=>$request['postgraduante_id']
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
    public function pagosPostgrados($idPostgrado){
        try {
            $result = Pago::select('idPago','boleta','costo_unitario','item','fecha_cobro','idPostgraduante',DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"),'ci')
            ->join('postgraduantes','pagos.postgraduante_id','=','postgraduantes.idPostgraduante')
            // ->join('postgrados','pagos.postgrado_id','=','postgrados.idPostgrado')
            ->where('pagos.postgrado_id','=',$idPostgrado)
            ->get();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' =>  number_format($result->sum('costo_unitario'), 2, ',', '.').'[Bs.]',
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
}
