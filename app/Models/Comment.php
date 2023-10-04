<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = []; // allow mass assignment

    public function post()
    {
        return $this->belongsTo(Post::class); // post_id
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id
    }
}
