<?php

namespace App\Http\Controllers;

use App\Model\Reply;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store()
    {
        $params = request()->all();
        $params['user_id'] = auth('api')->user()->id;
        $reply = Reply::create($params);
        return response()->json(['code' => 200, 'data' => $reply, 'msg' => '1 success!']);
    }
}
