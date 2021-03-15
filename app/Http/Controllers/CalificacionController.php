<?php
namespace App\Http\Controllers;
use App\Models\Calificacion;
use App\Models\Materia;
use App\Models\Postgrado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NumeroLetras;
class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Inscripcion::all();
        try {
            $inscripcion_result = Calificacion::all();
            if (!$inscripcion_result->isEmpty()) {
                return response()->json([
                    'data' => $inscripcion_result,
                    'success' => true,
                    'total' => count($inscripcion_result),
                    'message' => 'Lista de calificaciones',
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
            foreach ($request['notas'] as $key => $value) {
                Calificacion::where('idCalificacion','=',$value['calificacion_id'])->update([
                    'nota_numerica'=>$value['nota_numerica'],
                    'nota_literal'=>NumeroLetras::convertir($value['nota_numerica']),
                    'observacion'=>$value['observacion'],
                    'estado'=>1
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Calificaciones actualizadas correctamente',
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
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
    // **********************************
    public function calificacionesPostgrado($idPostgrado, $idMateria, $idDocente)
    {
        try {
            $materia_res = Materia::find($idMateria);
            $postgrado_res = Postgrado::find($idPostgrado);
            $docente = Usuario::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"))->where('idUsuario', '=', $idDocente)->get()->first();
            $inscripcion_result = Calificacion::select(DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',IFNULL(nombres,'')) AS full_name"), 'idCalificacion', 'nota_numerica', 'observacion')
                ->where('postgrado_id', '=', $idPostgrado)->where('materia_id', '=', $idMateria)
                ->join('postgraduantes', 'calificaciones.postgraduante_id', '=', 'postgraduantes.idPostgraduante')
                ->join('materias', 'calificaciones.materia_id', '=', 'materias.idMateria')
                ->orderBy('full_name', 'asc')
                ->get();
            $resultado_calificaciones = [
                'materia' => $materia_res,
                'postgrado' => $postgrado_res->nombre,
                'docente' => $docente->full_name,
                'postgrado_id' => $idPostgrado,
                'materia_id' => $idMateria,
                'calificaciones' => $inscripcion_result,
            ];
            if (!$inscripcion_result->isEmpty()) {
                return response()->json([
                    'data' => $resultado_calificaciones,
                    'success' => true,
                    'total' => count($inscripcion_result),
                    'message' => 'Lista de calificaciones',
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
