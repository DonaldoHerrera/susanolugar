<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\Mail\AuthMail;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        
        $request->validate([
            'nombre'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'telefono'    => 'required|string',
            'password' => 'required|string|confirmed',
        ]);
        
        $user = new User([
            'nombre'     => $request->nombre,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'password' => bcrypt($request->password),
            'confirmation_code' => str_random(5),
        ]);
        
        $mailAuth = new AuthMail($user->confirmation_code);
            Mail::to($user->email)->send($mailAuth);

        $user->save();
        return response()->json([
            'message' => 'Successfully created user!', 'success' => true], 201);
    }
    public function login(Request $request)
    {

        //validar datos
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'success' => true,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out','success' => true]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function verify(Request $request)
    {
        
        $user= User::where('confirmation_code',$request->confirmation_code)->first();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        if($user){
            $user->confirmation_code=null;
            $user->save();
            return response()->json(['message' =>
                'Tu cuenta ha sido activada correctamente', 'status' => 201,
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)
                        ->toDateTimeString(),
        ],201);
        }
        return response()->json(['message' =>
                'El codigo de confirmacion es incorrecto', 'status' => 401,
        ],401);
        
    }
}
