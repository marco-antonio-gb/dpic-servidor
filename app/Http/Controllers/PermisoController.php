<?php
namespace App\Http\Controllers;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Validator;
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Permiso::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de permisos',
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
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'descripcion' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                Permiso::create(array_merge(
                    $validator->validated()
                ));
                return response()->json([
                    'success' => true,
                    'message' => 'Permiso registrado correctamente',
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Permiso::where('idPermiso', '=', $id)->get()->first();
            if ($result) {
                return [
                    'success' => true,
                    'data' => $result,
                    'status_code'=>200
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'No se encontro ningun registro',
                    'status_code'=>204
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
     * @param  \App\Models\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'descripcion' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_rol = [
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                ];
                Permiso::where('idPermiso', '=', $id)->update($res_rol);
                return response()->json([
                    'success' => true,
                    'message' => 'Permiso Actualizado correctamente',
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
     * @param  \App\Models\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Permiso::where('idPermiso', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Permiso eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
