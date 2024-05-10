<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login successful',
                'token' => Auth::user()->createToken('todo-api')->plainTextToken,
                'user' => Auth::user(),
            ]);
        }
        return response()->json([
            'message' => 'Your email or password is incorrect',
        ]);
    }
}
