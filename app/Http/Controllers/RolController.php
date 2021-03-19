<?php
/*
 * Copyright (c) 2021.  modem.ff@gmail.com | Marco Antonio Gutierrez Beltran
 */
namespace App\Http\Controllers;

use Validator;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function index()
    {
        try {
            $result = Role::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de roles',
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
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',
                'guard_name' => 'required',
                'descripcion' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                $newRole = Role::create(array_merge(
                    $validator->validated()
                ));
                $permisos = $request['permisos'];
                foreach ($permisos as $value) {
                    $data[] = $value['name'];
                }
                $newRole->syncPermissions($data);
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Rol registrado correctamente',
                    'status_code' => 201,
                    'datos' => $request['permisos'],
                ], 201);
            }
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
            $role = Rol::where('id', '=', $id)->get()->first();
            // $role = Role::find($id);
            $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                ->where("role_has_permissions.role_id", $id)
                ->get();
            if ($role) {
                return [
                    'success' => true,
                    'data' => ['rol' => $role, 'permisos' => $rolePermissions],
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
            $validator = Validator::make($request->all(), [
                'name' => 'required',
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
                    'name' => $request['name'],
                    'descripcion' => $request['descripcion'],
                ];
                // $role = Role::where('id', '=', $id)->update($res_rol);
                $role = Role::find($id);
                $role->name = $request['name'];
                $role->descripcion = $request['descripcion'];
                $role->save();
                $permisos = $request['permisos'];
                foreach ($permisos as $value) {
                    $data[] = $value['name'];
                }
                $role->syncPermissions($data);
                return response()->json([
                    'success' => true,
                    'message' => 'Rol Actualizado correctamente',
                ], 201);
            }
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
            Rol::where('idRol', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Rol eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
