<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('token-name')->plainTextToken;

                return response()->json([
                    'message' => "Berhasil login",
                    'data' => [
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                    ],
                    'token' => $token
                ], 200);
            } else {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Gagal login, {$th->getMessage()}",
            ], 422);
        }
    }
}
