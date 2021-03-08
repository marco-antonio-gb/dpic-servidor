<?php
namespace App\Http\Controllers;
use Validator;
use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\DocenteMateria;
use App\Models\MateriaPostgrado;

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
 
    public function store(Request $request)
    {
         
        try {
            $validator = Validator::make($request->all(), [
                'materias.*.nombre' => 'required | unique:materias',
                'materias.*.sigla' => 'required | unique:materias',
                'materias.*.credito' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                // Materia::create($request->all());
                $idPostgrado = $request['postgrado_id'];
                $materias = $request['materias'];
                foreach ($materias as $key => $value) {
                    $lastIdMateria = Materia::create($value)->idMateria;
                    MateriaPostgrado::create([
                        'materia_id' => $lastIdMateria,
                        'postgrado_id' => $idPostgrado,
                    ]);
                    DocenteMateria::create([
                        'materia_id' => $lastIdMateria,
                        'docente_id'=>$value['docente_id'],
                        'postgrado_id' => $idPostgrado,
                        
                    ]);
                }
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
 
    public function show($id)
    {
        try {
            $materia = Materia::where('idMateria', '=', $id)->get()->first();
            // $postgrado = MateriaPostgrado::join('postgrados','materia_postgrado.postgrado_id','=','postgrados.idPostgrado')->where('materia_postgrado.materia_id','=',$id)->get();
            
            
            if ($materia ) {
                return [
                    'success' => true,
                    'data'=>$materia,
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
    public function update(Request $request, $id)
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
                    'credito' => $request['credito'],
                ];
                Materia::where('idMateria', '=', $id)->update($res_materia);
                // MateriaPostgrado::create()
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
    public function destroy($id)
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
