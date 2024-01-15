<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PHPUnit\Util\Xml\ValidationResult;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();
        $enc_pass = md5($request->password);

        if (!$user || $enc_pass != $user->password) {
            return show_response_json(false, "Login failed!", []);
        }

        $tkn = $user->createToken('login_token')->plainTextToken;

        return show_response_json(true, "Login success!", ['token' => $tkn]);
    }

    public function logout(Request $request)
    {
        $resp = $request->user()->currentAccessToken()->delete();
        if (!$resp) {
            return show_response_json(false, "Logout failed!", []);
        }
        return show_response_json(true, "Logout success!", []);
    }
}
