<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = [
        'post_id',
        'comment_id',
        'name',
        'email',
        'reply',
        'person_type',
        'status',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
