<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MailableName;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use App\Mail\OkEmail;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        //
    }

    public static function sendEmail($user_id, $hash, $email)
    {

        $link = "http://itbsm.com.br/api/confirmation-email?hash={$hash}&user_id={$user_id}";
        $data = [
            'link' => $link
        ];
    
        Mail::to($email)->send(new MailableName($link));
   
        return 'E-mail enviado com sucesso!';
    }
    public static function confirmationEmail(Request $request)
    {
        $hashedApiKey = $request->query('hash');
        $user_id = $request->query('user_id');

        $user = User::where('id_int' , $user_id)->first();
        $user->email_verified_at = now(); // Exemplo de campo que pode ser atualizado
        $user->save();
        
        if (!Hash::check($user->api_key, $hashedApiKey)) {
            return [
                'status' => false,
                'message' => 'Unauthorized',
            ];
        } 
        
        $email = Email::where('user_id', $user_id)->first();

        if ($email) {
            // Faça as atualizações necessárias
            $email->confirmation = 1; // Exemplo de campo que pode ser atualizado
            $email->save();
            Mail::to($email)->send(new OkEmail());
            return response()->json([
                'success' => true,
                'message' => 'Email confirmado com sucesso!',
                'email' => $email
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email não encontrado.'
        ]);

        
 
    
    
   
        return 'E-mail enviado com sucesso!';
    }
}
