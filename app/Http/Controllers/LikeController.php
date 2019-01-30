<?php

namespace App\Http\Controllers;


use App\Model\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function inpost(Post $post)
    {
        $uid = auth('api')->user()->id;
        $post->likes()->firstOrCreate(['user_id' => $uid]);
        return response()->json(['code' => 200, 'msg' => '1 like in post success']);
    }

    public function outpost(Post $post)
    {
        $uid = auth('api')->user()->id;
        $post->likes($uid)->delete();
        return response()->json(['code' => 200, 'msg' => '1 like out post success']);
    }

}