<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
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
        try {
            $usuarios_res = Usuario::select('idUsuario', DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',nombres) AS full_name"), 'celular', 'email', 'profesion', 'activo', 'activo')->with(array('roles' => function ($query) {$query->select('id', 'name');}))->whereHas('roles', function ($query) {$query->where('name', '!=', 'Docente');})->get();
            if (!$usuarios_res->isEmpty()) {
                return response()->json([
                    'data' => $usuarios_res,
                    'success' => true,
                    'total' => count($usuarios_res),
                    'message' => 'Lista de usuarios',
                ], 200);
            } else {
                return [
                    'success' => false,
                    'message' => 'No existen resultados',
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
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'paterno' => 'required|string|between:2,100',
                'materno' => 'required|string|between:2,100',
                'nombres' => 'required|string|between:2,100',
                'ci' => 'required|string|max:10|unique:usuarios',
                'ci_ext' => 'required|string|max:5',
                'celular' => 'required|string|max:9',
                'profesion' => 'required|string|max:30',
                'roles' => 'required|max:30',
                'email' => 'required|string|email|max:100|unique:usuarios',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                ], 400);
            }
            $user = Usuario::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
            $roles = $request['roles'];
            foreach ($roles as $value) {
                $data[] = $value['name'];
            }
            $user->syncRoles($data);
            DB::commit();
            return response()->json([
                'message' => 'Usuario registrado correctamtente',
                'user' => $user,
            ], 201);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
    public function show($id)
    {
        try {
            $usuarios_res = Usuario::where('idUsuario', $id)->with(array('roles' => function ($query) {$query->select('id', 'name', 'descripcion');}))->first();
            if ($usuarios_res) {
                return [
                    'success' => true,
                    'data' => $usuarios_res,
                    // 'permisos'=>$permissionNames,
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
        // return $request;
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
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
                    'telefono' => $request['telefono'],
                    'profesion' => $request['profesion'],
                    'email' => $request['email'],
                ];
                $user = Usuario::find($id);
                $user->update($res_usuario);
                $roles = $request['roles'];
                foreach ($roles as $value) {
                    $data[] = $value['name'];
                }
                $user->syncRoles($data);
                DB::commit();
            }
            return response()->json([
                'success' => true,
                'message' => 'Usuario Actualizado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Usuario::where('idUsuario', '=', $id)->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            DB::rollback();
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
            $result = Usuario::select('idUsuario', DB::raw("CONCAT(IFNULL(paterno,''),' ',IFNULL(materno,''),' ',nombres) AS full_name"), 'celular', 'email', 'profesion', 'activo', 'activo')->role('docente')->with(array('roles' => function ($query) {$query->select('id', 'name');}))->get();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de docentes',
                ], 200);
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
    public function getAllPermissions()
    {
        
        try {
             $id = auth()->user()->idUsuario;

            $user=Usuario::find($id);

            if ($user) {
                $permisos = $user->getPermissionsViaRoles()->pluck('name');
                if($permisos->isEmpty()){
                    return response()->json([
                        'success' => false,
                        'message' => "No existen permisos para este usuario",
                    ], 404);    
                }else{
                    return response()->json([
                        'success' => true,
                        'data' => $permisos,
                    ], 200);
                }
                
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
