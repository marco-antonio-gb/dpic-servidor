<?php
namespace App\Http\Controllers;

use App\Models\Postgraduante;
use Illuminate\Http\Request;
use Validator;

class PostgraduanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Postgraduante::all();
            if (!$result->isEmpty()) {
                return response()->json([

                    'data' => $result,
                    'success' => true,
                    'total'=>count($result),
                    'message' => 'Lista de postgraduantes',
                    'status_code'=>200
                ]);
            } else {
                return [
                    'success' => false,
                    'message' => 'No existen resultados',
                    'status_code'=>201
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
                'paterno' => 'required|string|between:2,100',
                'materno' => 'required|string|between:2,100',
                'nombres' => 'required|string|between:2,100',
                'lugar_nac' => 'required|string|between:2,100',
                'ci' => 'required|string|max:10|unique:postgraduantes',
                'ci_ext' => 'required|string|max:5',
                'celular' => 'required|string|max:9',
                'telefono' => 'required|string|max:9',
                'profesion' => 'required|string|max:30',
                'correo' => 'required|string|email|max:100|unique:postgraduantes',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code'=>400
                ]);
            }
            Postgraduante::create(array_merge(
                $validator->validated()
            ));
            return response()->json([
                'success' => true,
                'message' => 'Postgraduante registrado correctamente',
                'status_code'=>201
            ], 201);

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
            $result = Postgraduante::where('idPostgraduante', '=', $id)->get()->first();
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

    public function update($id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'paterno' => 'required|string|between:2,100',
                'materno' => 'required|string|between:2,100',
                'nombres' => 'required|string|between:2,100',
                'lugar_nac' => 'required|string|between:2,100',
                'ci' => 'required|string|max:10',
                'ci_ext' => 'required|string|max:5',
                'celular' => 'required|string|max:9',
                'telefono' => 'required|string|max:9',
                'profesion' => 'required|string|max:30',
                'correo' => 'required|string|email|max:100|unique:postgraduantes',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code'=>400
                ]);
            }
            $res_postgraduante = [
                'paterno' => $request['paterno'],
                'materno' => $request['materno'],
                'nombres' => $request['nombres'],
                'lugar_nac' => $request['lugar_nac'],
                'ci' => $request['ci'],
                'ci_ext' => $request['ci_ext'],
                'celular' => $request['celular'],
                'telefono' => $request['telefono'],
                'profesion' => $request['profesion'],
                'correo' => $request['correo'],
            ];
            $result = Postgraduante::where('idPostgraduante', '=', $id)->update($res_postgraduante);
            return response()->json([
                'success' => true,
                'message' => 'Postgraduante Actualizado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }

    }

    public function destroy($id)
    {
        try {

            Postgraduante::where('idPostgraduante', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Postgraduante eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
