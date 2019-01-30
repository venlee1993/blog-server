<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Api\BaseController;


class UserController extends BaseController
{

    protected $user = null;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }

    public function index()
    {
        return $this->respond($this->user);
    }


    public function setting()
    {
        $params = request()->all();
        $this->user->update($params);
        return $this->message('success');
    }

    public function upload()
    {
        $file = request()->file('avatar');
    }
}