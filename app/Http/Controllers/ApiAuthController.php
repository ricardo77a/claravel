<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApiUsersRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredencialesMail;

class ApiAuthController extends Controller
{
    public function register(ApiUsersRequest $request)
    {
        Mail::to($request->email)->send(new CredencialesMail($request->all()));;
        return $request->email;

    	$user = new User($request->all());
    	$user->password = bcrypt($request->password);
    	$user->save();


    	$token = $user->createToken('Api Token')->plainTextToken;

    	return response()->json(['user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
        	return response(['error' => 'Las credenciales son incorrectas'], 401);
        }

        $user = Auth::user();
    	$token = $user->createToken('Api Token')->plainTextToken;
    	return response()->json(['user' => $user, 'token' => $token]);
    }

    public function logout(Request $request)
    {
    	$request->user()->currentAccessToken()->delete();
    	return response()->json(['message' => 'logout']);
    }

    public function password()
    {
        # code...
    }
}
