<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Api\BaseController;
use App\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('list');
    }

    public function list($id)
    {
        $comments = Comment::with('user', 'replies.user', 'replies.replyer')
            ->orderBy('created_at', 'asc')
            ->where('post_id', $id)
            ->take(5)
            ->get();

        return $this->success(['list' => $comments]);
    }

    public function store(Request $request)
    {
        $user = auth('api')->user();
        $params = $request->all();
        $params['user_id'] = $user->id;
        $comment = Comment::create($params);
        $comment['user'] = $user;
        return $this->success($comment);
    }

    public function delete()
    {
        $file = request()->file('avatar');
    }

}