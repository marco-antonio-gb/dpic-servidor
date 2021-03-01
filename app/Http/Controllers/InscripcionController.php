<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
   
    public function index()
    {
        try {
            $result = Inscripcion::with('postgraduantes','postgrados')->get();
            if (!$result->isEmpty()) {
                return response()->json([

                    'data' => $result,
                    'success' => true,
                    'total'=>count($result),
                    'message' => 'Lista de inscripciones',
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

     
    public function store(Request $request)
    {
        //
    }

    
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }
 
    public function destroy(Inscripcion $inscripcion)
    {
        //
    }
}
