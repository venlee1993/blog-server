<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    public function liked()
    {
        return $this->morphOne(Like::class, 'likeable')->where('user_id', auth('api')->user()->id);
    }
}
