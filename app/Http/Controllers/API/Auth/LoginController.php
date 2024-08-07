<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function login(Request $request){
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt to log the user in
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Create the token for the user
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request){
        // Get the authenticated user
        $user = Auth::user();

        // Revoke all tokens of the user
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
