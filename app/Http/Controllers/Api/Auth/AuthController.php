<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Type_user;
use App\Models\ApiKey;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller 
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'api_key' => 'required|string',
        ]);
        $credentials = $request->only('email', 'api_key');

        $user = User::where('api_key', $credentials['api_key'])->first();
        if ($user == null) {
            return [
                'status' => false,
                'message' => 'Unauthorized',
            ];
        } 
        $hashedApiKey = ApiKey::where('user_id', $user->id_int)->value('hash');
        $apiKey = $credentials['api_key'];
        if (!Hash::check($apiKey, $hashedApiKey)) {
            return [
                'status' => false,
                'message' => 'Unauthorized',
            ];
        } 
        
        $confirmation = false;

        if (empty($user->email_verified_at)) {
            $confirmation = true;
        }
        $user->confirmation = $confirmation;

        // Gerar o token JWT
        $token = JWTAuth::fromUser($user);

        $user->verificar = $user['id_int'];
        $typ_e = Type_user::find($user['type_user']);

        $user->nameType = $typ_e ?  $typ_e["name"] : 'Tipo desconhecido';
        return response()->json([
            'status' => true,
                'user' => $user->only(['email', 'name', 'phone', 'type_user', 'id_int', 'confirmation']),
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function registerEmpresa(Request $request){
        dd($request);
        
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $token = auth()->login($user);
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User created successfully',
        //     'user' => $user,
        //     'authorization' => [
        //         'token' => $token,
        //         'type' => 'bearer',
        //     ]
        // ]);
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            "phone" => 'required',
            'password' => 'required|string|min:5',
            "password2" => 'required|string|min:5',
            "hiddenEmpresas" => 'required|integer|in:0,1',
            "confirmation" =>  'required|integer|in:1',
        ], [
            'confirmation.required' => 'O campo confirmação é obrigatório.',
            'confirmation.boolean' => 'O campo confirmação deve ser verdadeiro ou falso.',
        ]);

      


        // $user = User::create([
        //     'id' => $request->name,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        if($request->hiddenEmpresas == 1){
            $typer_user = 5;
        }
        $ultimoUsuario = User::latest('id_int')->first();
        $id_ = Str::uuid()->toString();
        $ultimoUsuario = $ultimoUsuario->id_int+1;
        User::create([
            'id' => $id_,
            'name' => $request->name,
            'api_key' => $request->password,
            'type_user' => $typer_user,
            'id_int' => $ultimoUsuario,
            'phone' => $request->phone,
            'email' => $request->email,
            'email_verified_at' => false,
            'password' => Hash::make($request->password),
            'remember_token' => false,
        ]);

        ApiKey::create([
            'user_id' => $ultimoUsuario,
            'hash' => Hash::make($request->password),
        ]);

        DB::table('email')->insert([
            'hash' => Hash::make($request->password),
            'user_id' => $ultimoUsuario,
            'email' => $request->email,
            'confirmation' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $hash = Hash::make($request->password);
        $email_para_enviar = $request->email;

        $enviar = EmailController::sendEmail($ultimoUsuario,$hash,$email_para_enviar);


        return response()->json([
            'status' => true,
            'message' => 'Empresa created successfully. Verifique e-mail para completar cadastro.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => auth()->user(),
            'authorization' => [
                'token' => auth()->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
