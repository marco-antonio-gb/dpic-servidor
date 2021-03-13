<?php
namespace App\Http\Controllers;
use App\Models\Pago;
use App\Models\Postgrado;
use App\Models\Postgraduante;
use Illuminate\Support\Facades\DB;
use PDF;
class ReporteController extends Controller
{
    public function calificacionesAsignatura()
    {
        try {
            $result = Postgrado::all();
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
            $result = Postgrado::all();
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
    public function pagosGeneral($idPostgrado, $idPostgraduante)
    {
        /*
        postgraduante: nombre completo
        postgrado: nombre
        pago: item, monto, nro boleta, fecha
         */
        try {
            $datetime = date('d/m/Y');
            $postrado_res = Postgrado::find($idPostgrado);
            $postraduante_res = Postgraduante::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $idPostgraduante)->get()->first();
            $pagos_res = Pago::select('idPago', 'boleta', 'costo_unitario', 'item', 'fecha_cobro')
                ->join('postgraduantes', 'pagos.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                ->join('postgrados', 'pagos.postgrado_id', '=', 'postgrados.idPostgrado')
                ->where('pagos.postgrado_id', '=', $idPostgrado)
                ->where('pagos.postgraduante_id', '=', $idPostgraduante)
                ->get();
            $reporte_pdf = [
                'postgraduante' => $postraduante_res->full_name,
                'postgrado' => $postrado_res->nombre,
                'pagos' => $pagos_res,
            ];
            return $reporte_pdf;
            // return  view('reporte_pagos_general', ['postgrados'=>$reporte_pdf]);
            // $pdf = PDF::loadView('reporte_pagos_personal', array('pagos_personal_pdf' => $reporte_pdf));
            // return $pdf->stream($postraduante_res->full_name.'REPORTE PAGOS'.$datetime.'.pdf');
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function pagosPersonal($idPostgrado, $idPostgraduante)
    {
        /*
        postgraduante: nombre completo
        postgrado: nombre
        pago: item, monto, nro boleta, fecha
         */
        try {
            $datetime = date('d/m/Y');
            $postrado_res = Postgrado::find($idPostgrado);
            $postraduante_res = Postgraduante::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $idPostgraduante)->get()->first();
            $pagos_res = Pago::select('idPago', 'boleta', 'costo_unitario', 'item', 'fecha_cobro')
                ->join('postgraduantes', 'pagos.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                ->join('postgrados', 'pagos.postgrado_id', '=', 'postgrados.idPostgrado')
                ->where('pagos.postgrado_id', '=', $idPostgrado)
                ->where('pagos.postgraduante_id', '=', $idPostgraduante)
                ->get();
            $reporte_pdf = [
                'postgraduante' => $postraduante_res->full_name,
                'postgrado' => $postrado_res->nombre,
                'pagos' => $pagos_res,
            ];
            // return $reporte_pdf;
            // return  view('reporte_pagos_personal', ['postgrados'=>$result]);
            $pdf = PDF::loadView('reporte_pagos_personal', array('pagos_personal_pdf' => $reporte_pdf));
            return $pdf->stream($postraduante_res->full_name . 'REPORTE PAGOS' . $datetime . '.pdf');
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function pagosPostgrados($idPostgrado)
    {
        try {
            $datetime = date('d/m/Y');
            $postrado_res = Postgrado::find($idPostgrado);
            $postgruantes_pagos = DB::table('pagos')
                ->select('postgraduante_id')
                ->groupBy('postgraduante_id')
                ->get();
            
            foreach ($postgruantes_pagos as $pago) {
                $postraduante_res = Postgraduante::select('idPostgraduante',DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $pago->postgraduante_id)->get()->first();
                $pagos_res = Pago::select('idPago', 'boleta', 'costo_unitario', 'item', 'fecha_cobro','postgraduante_id')
                    ->join('postgraduantes', 'pagos.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                    ->join('postgrados', 'pagos.postgrado_id', '=', 'postgrados.idPostgrado')
                    ->where('pagos.postgrado_id', '=', $idPostgrado)
                    ->where('pagos.postgraduante_id', '=', $pago->postgraduante_id)
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
                //  return response()->json([
                //         'success'=>true,
                //         'postgrado'=>$postrado_res->nombre,
                //         'cantidad_pagos'=>$postrado_res->cantidad_pagos,
                //         'pagos_postgrado' => $reporte_pagos,
                //      ]);
            // return  view('reporte_pagos_personal', ['postgrados'=>$result]);

                $pdf = PDF::loadView('reporte_pagos_general', array('pagos_general_pdf' => [
                    'success'=>true,
                    'postgrado'=>$postrado_res->nombre,
                    'cantidad_pagos'=>$postrado_res->cantidad_pagos,
                    'pagos_postgrado' => $reporte_pagos,
                 ]));
                $pdf->setPaper('legal', 'landscape');
                return $pdf->stream($postrado_res->nombre . 'REPORTE PAGOS' . $datetime . '.pdf');
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
