<?php
namespace App\Http\Controllers;

use App\Models\Requisito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Validator;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Requisito::all();
            if (!$result->isEmpty()) {
                return response()->json([
                    'data' => $result,
                    'success' => true,
                    'total' => count($result),
                    'message' => 'Lista de requisitos',
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
                'archivo' => 'required|mimes:png,jpg|max:2048',
                'descripcion' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'validator' => $validator->errors()->all(),
                    'status_code' => 400,
                ]);
            } else {
                if ($files = $request->file('archivo')) {
                    $image_data = "";

                    $uploadFolder = 'requisitos';
                    $image_data = $request->file('archivo');
                    if ($image_data) {
                        $file = $image_data->getClientOriginalName();
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                        $image_uploaded_path = $image_data->store($uploadFolder);
                        $evento_request = [
                            'fileName' => $fileName,
                            "image_name" => basename($image_uploaded_path),
                            'fileExt' => $fileExtension,
                            'imagenLink' => Storage::url($image_uploaded_path),
                        ];
                        $image_url = $uploadFolder . '/' . basename($image_uploaded_path);
                    } else {
                        // Image::configure(array('driver' => 'gd'));
                        $time = $this->generateRandomString(40);
                        $name = $time . '.' . explode('/', explode(':', substr($request->archivo, 0, strpos($request->archivo, ';')))[1])[1];
                        $resize = Image::make($request->archivo)->resize(600, 600)->encode('jpg');
                        // $upload_data = $resize->store($name);
                        $store = Storage::put($uploadFolder . '/' . $name, $resize->__toString());
                        $url = Storage::url($name);
                        $image_url = $uploadFolder . '/' . $name;
                    }
                    $requisito_result = [
                        'nombre' => $request->nombre,
                        'archivo' => $image_url,
                        'descripcion' =>$request->descripcion
                   
                    ];
                    Requisito::create($requisito_result);
                    return response()->json([
                        "success" => true,
                        "message" => "File successfully uploaded",
                        "file" => $file,
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No se cargo una imagen',
                        'status_code' => 404,
                    ], 201);
                }

                // Requisito::create(array_merge(
                //     $validator->validated()
                // ));
                // return response()->json([
                //     'success' => true,
                //     'message' => 'Requisito registrado correctamente',
                //     'status_code' => 201,
                // ], 201);
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
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Requisito::where('idRequisito', '=', $id)->get()->first();
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
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisito $requisito)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'archivo' => 'required',
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
                    'archivo' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                ];
                Requisito::where('idRequisito', '=', $id)->update($res_rol);
                return response()->json([
                    'success' => true,
                    'message' => 'Requisito Actualizado correctamente',
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
     * @param  \App\Models\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisito $requisito)
    {
        try {
            Requisto::where('idRequisto', '=', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Requisto eliminado correctamente',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 404);
        }
    }
}
