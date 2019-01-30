<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/21
 * Time: 15:36
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        $params = $request->all();
        $params['name'] = $params['email'];
        $params['password'] = bcrypt($params['password']);

        User::create($params);
        return response()->json(['message' => 'register success'], 201);
    }
}