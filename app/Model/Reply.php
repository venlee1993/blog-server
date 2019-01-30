<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function comment()
    {
        return $this->belongsTo(Comment::classs);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name', 'avatar']);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replyer()
    {
        return $this->hasOne(User::class, 'id', 'reply_user_id')->select(['id', 'name', 'avatar']);
    }
}
