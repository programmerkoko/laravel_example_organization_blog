<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id", "id");
    }

public function user() {

    return $this->belongsTo(User::class, "user_id", "id");
}

}