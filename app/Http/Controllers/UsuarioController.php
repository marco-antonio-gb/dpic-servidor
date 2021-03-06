<?php
namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // comp = Component::select(DB::raw("CONCAT('name','id') AS ID"))->get()
        try {
            // DB::raw("SELECT IF((paterno AND materno) IS NULL, 'N/A', CONCAT(paterno,' ', IFNULL(materno, ''))) AS member_name FROM users  WHERE id = 1");
            // $result = Usuario::select('idUsuario', 'paterno', 'materno', 'nombres', 'celular', 'email', 'profesion', 'activo')->get();
            $result = Usuario::select('idUsuario', DB::raw("CONCAT(paterno,' ',materno,' ',nombres) AS full_name"), 'celular', 'email', 'profesion', 'activo', 'activo')->where('tipo_usuario_id', '!=', 2)->get();
            // $result=Usuario::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de usuarios',
                    'status_code' => 200,
                ]);
            } else {
                return [
                    'success' => false,
                    'message' => 'No existen resultados',
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

    public function store(Request $request)
    {
        // return $request;
        try {
            $tipo = $request['tipo_usuario'];
            $validator = Validator::make($request->all(), [
                'paterno' => 'required|string|between:2,100',
                'materno' => 'required|string|between:2,100',
                'nombres' => 'required|string|between:2,100',
                'ci' => 'required|string|max:10|unique:usuarios',
                'ci_ext' => 'required|string|max:5',
                'celular' => 'required|string|max:9',
                'profesion' => 'required|string|max:30',
                'titulo_abrv' => 'required|string|max:30',
                'tipo_usuario_id' => 'required|max:30',
                'email' => 'required|string|email|max:100|unique:usuarios',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            }
            $user = Usuario::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
            $user_id = $user->idUsuario;
            if ($tipo === 'docente') {
                $res_docente = [
                    'usuario_id' => $user_id,
                ];
                Docente::save($res_docente);
            }
            return response()->json([
                'message' => 'Usuario registrado correctamtente',
                'user' => $user,
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
            $result = Usuario::where('idUsuario', '=', $id)->get()->first();
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

    public function update(Request $request, $id)
    {
        try {
            $tipo = $request['tipo_usuario'];
            $validator = Validator::make($request->all(), [
                'paterno' => 'required|string|between:2,100',
                'materno' => 'required|string|between:2,100',
                'nombres' => 'required|string|between:2,100',
                'ci' => 'required|string|max:10',
                'ci_ext' => 'required|string|max:5',
                'celular' => 'required|string|max:9',
                'profesion' => 'required|string|max:30',
                'email' => 'required|string|email|max:100',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $res_usuario = [
                    'paterno' => $request['paterno'],
                    'materno' => $request['materno'],
                    'nombres' => $request['nombres'],
                    'ci' => $request['ci'],
                    'ci_ext' => $request['ci_ext'],
                    'celular' => $request['celular'],
                    'profesion' => $request['profesion'],
                    'email' => $request['email'],
                ];
            }
            Usuario::where('idUsuario', '=', $id)->update($res_usuario);
            $user_id = $id;
            if ($tipo === 'docente') {
                $res_docente = [
                    'usuario_id' => $user_id,
                ];
                Docente::save($res_docente);
            }
            return response()->json([
                'success' => true,
                'message' => 'Usuario Actualizado correctamente',
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
            Usuario::where('idUsuario', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
    // *******************************************************************
    public function indexDocentes()
    {
        try {
            $result = Usuario::select('idUsuario', DB::raw("CONCAT(titulo_abrv,' ',paterno,' ',materno,' ',nombres) AS full_name"), 'celular', 'email', 'profesion', 'activo', 'activo')->where('tipo_usuario_id', '=', 2)->get();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de usuarios',
                    'status_code' => 200,
                ]);
            } else {
                return [
                    'success' => false,
                    'message' => 'No existen resultados',
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
}
