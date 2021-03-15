<?php
namespace App\Http\Controllers;
use App\Models\Pago;
use App\Models\Postgrado;
use App\Models\Postgraduante;
use App\Models\Calificacion;
use App\Models\Materia;
 
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use PDF;
class ReporteController extends Controller
{
    public function calificacionesAsignatura($idPostgrado, $idMateria, $idDocente)
    {
        try {
            $materia_res = Materia::find($idMateria);
            $postgrado_res = Postgrado::find($idPostgrado);
            $docente = Usuario::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idUsuario', '=', $idDocente)->get()->first();
            $inscripcion_result = Calificacion::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"), 'idCalificacion', 'nota_numerica','nota_literal', 'observacion')
                ->where('postgrado_id', '=', $idPostgrado)->where('materia_id', '=', $idMateria)
                ->join('postgraduantes', 'calificaciones.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                ->join('materias', 'calificaciones.materia_id', '=', 'materias.idMateria')
                ->orderBy('full_name', 'asc')
                ->get();
            $reporte_pdf = [
                'materia' => $materia_res,
                'postgrado' => $postgrado_res->nombre,
                'docente' => $docente->full_name,
                'postgrado_id' => $idPostgrado,
                'materia_id' => $idMateria,
                'calificaciones' => $inscripcion_result,
            ];
            // return $reporte_pdf;
            $pdf = PDF::loadView('reporte_calificaciones_asignatura', array('calificaciones_asignatura_pdf' => $reporte_pdf));
            return $pdf->stream($materia_res->nombre . 'REPORTE CALIFICACIONES'  . '.pdf');
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'exception' => (string) $ex,
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
            ], 404);
        }
    }
    public function calificacionesPersonal($idPostgrado, $idPostgraduante)
    {
        try {
            $postgraduante_res = Postgraduante::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idPostgraduante', '=', $idPostgraduante)->get()->first();
            $postgrado_res = Postgrado::find($idPostgrado);
            
            $inscripcion_result = Calificacion::select('materias.nombre AS asignatura', 'idCalificacion', 'nota_numerica','nota_literal', 'observacion')
                ->where('postgrado_id', '=', $idPostgrado)
                ->where('postgraduante_id', '=', $idPostgraduante)
                ->join('postgraduantes', 'calificaciones.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                ->join('materias', 'calificaciones.materia_id', '=', 'materias.idMateria')
          
                ->get();
            $reporte_pdf = [
                'postgraduante' => $postgraduante_res->full_name,
                'postgrado' => $postgrado_res->nombre,
                'postgrado_gestion' => $postgrado_res->gestion,
                'cantidad_materias'=>count($inscripcion_result),
                'calificaciones' => $inscripcion_result
            ];
            // return $reporte_pdf;
            $pdf = PDF::loadView('reporte_calificaciones_personal', array('calificaciones_personal_pdf' => $reporte_pdf));
            return $pdf->stream($postgraduante_res->full_name . 'REPORTE CALIFICACIONES'  . '.pdf');
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
                    'postgrado_gestion'=>$postrado_res->gestion,
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
