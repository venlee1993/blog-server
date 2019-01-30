<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/21
 * Time: 12:40
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\PostRequest;
use App\Model\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api')->only('store');
    }

    public function index()
    {
        if (auth('api')->check()) {
            $post = Post::withCount('comments', 'likes')->with('liked')->take(10)->get();
        } else {
            $post = Post::withCount('comments', 'likes')->take(10)->get();
        }
        return $this->respond($post);
    }

    public function show(Post $post)
    {
        return $this->respond($post);
    }


    public function store(PostRequest $request)
    {
        $user_id = Auth::guard('api')->user()->id;
        $params = array_merge(['user_id' => $user_id, 'cover' => 'images/cover.jpg'], $request->all());
        $post = Post::create($params);
//        return response()->json(['code' => 200, 'post' => $post->id, 'msg' => 'publish success']);

        return $this->success(['code' => 200, 'post' => $post->id]);

    }
}