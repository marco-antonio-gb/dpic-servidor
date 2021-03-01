<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        
        // $verificarEstado = Usuario::select('activo')->where('email', '=', $credentials['email'])->get()->first();
        if (Usuario::where('email', '=', $credentials['email'])->exists()) {
            $verificarEstado = Usuario::select('activo')->where('email', '=', $credentials['email'])->get()->first();
            if ($verificarEstado['activo'] == 0) {
                return response()->json(['error' => 'Esta cuenta esta desactivada '], 401);
            } else {
                if (!$token = auth('api')->attempt($credentials)) {
                    return response()->json(['error' => 'Los datos no son correctos '], 401);
                }
                return $this->createNewToken($token);
            }
         }else{
            return response()->json(['error' => 'La cuenta no existe'], 401);
         }

         
        
    }
    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     if (!$token = auth()->attempt($validator->validated())) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Los datos ingresados no son validos.',
    //             'status_code'=>401
    //         ]);
    //     }

    //     return $this->createNewToken($token);
    // }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'paterno' => 'required|string|between:2,100',
    //         'materno' => 'required|string|between:2,100',
    //         'nombres' => 'required|string|between:2,100',
    //         'celular' => 'required|string|max:9',
    //         'email' => 'required|string|email|max:100|unique:usuarios',
    //         'password' => 'required|string|confirmed|min:6',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }

    //     $user = Usuario::create(array_merge(
    //         $validator->validated(),
    //         ['password' => bcrypt($request->password)]
    //     ));

    //     return response()->json([
    //         'message' => 'User successfully registered',
    //         'user' => $user,
    //     ], 201);
    // }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        $id = auth()->user()->idUsuario;
        $result = Usuario::select('usuarios.nombres','usuarios.idUsuario','tipo_usuarios.nombre AS rol','tipo_usuarios.descripcion')->join('tipo_usuarios','usuarios.tipo_usuario_id','=','tipo_usuarios.idTipoUsuario')->where('idUsuario','=',$id)->get()->first();
        // return response()->json(auth()->user());
        return response()->json($result);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            // 'success' => true,
            'access_token' => $token,
            // 'user'=>auth()->user()->only(['idUsuario','nombres','tipo_usuario']),
            // 'status_code'=>200
        ]);
         
    }

}
