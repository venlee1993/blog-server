<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/21
 * Time: 11:12
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'exists:users',
                'email'
            ],
            'password' => 'required|string|min:6|max:20',
        ];
        $params = $this->validate($request, $rules);
        $token = auth('api')->attempt($params);
        $user = auth('api')->user();
        if ($token) {
            return response(['token' => 'bearer ' . $token, 'user' => $user], 201);
        }
        return response(['error' => 'Error in account or password'], 400);
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'logout success'], 200);
    }
}