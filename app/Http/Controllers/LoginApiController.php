<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Check if email exists
        $user = User::where('email', $validated['email'])->first();

        if(!$user) {
            return response('Invalid Credential', 401);
        }
        
        // Check if password matches
        $is_password_valid = Hash::check($validated['password'], $user->password);

        if(!$is_password_valid) {
            return response('Invalid Credential', 401);
        }

        // Generate token
        // All HTTP Requests will use this token to make requests valid
        $token = $user->createToken('myapptoken')->plainTextToken;

        // return response($token, 200);
        return response([
            'user' => $user,
            'token' => $token,
            'message' => "Login Successful"
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response('Logout Successful', 200);
    }
}
