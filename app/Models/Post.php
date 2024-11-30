<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

protected $fillable = [
"writer",
"title",
"content"
];

    public function comments() {
return $this->hasMany(Comment::class, "post_id", "id");
    }

    public function users() {

return $this->belongsTo(User::class, "user_id", "id");

    }

}