<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController SPA認証
 * @package App\Http\Controllers\Frontend\Auth
 */
class LoginController extends Controller
{
    /**
     * ログインAPI
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->loginParams();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'data' => [
                    'data' => Auth::user(),
                    'status' => 200
                ]
            ]);
        }

        return response()->json(['message' => 'ログインに失敗しました'], 401);
    }

    /**
     * ログアウトAPI
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'ログアウトしました']);
    }
}
