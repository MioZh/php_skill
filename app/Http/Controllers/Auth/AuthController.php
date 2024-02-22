<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = Str::random(16);

        $expiresAt = Carbon::now()->addYears(2);
        $token_user = Token::create([
            'token' => $token,
            'expires_at' => $expiresAt,
            'user_id' => $user->id,
        ]);
        return response()->json(['message' => 'Пользователь успешно зарегистрирован', 'user' => $user, 'access_token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['message' => 'Login successful', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function user()
    {
        $user = Auth::user();

        return response()->json(['user' => $user]);
    }
}
