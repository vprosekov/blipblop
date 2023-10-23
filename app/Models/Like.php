<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model

{
    use HasFactory;
    protected $primaryKey = 'like_id';
    protected $table = "likes";
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    // Route::post('/posts', [AuthController::class,'createPost']);
    // Route::get('/posts', [AuthController::class,'getNewsFeed']);
    // Route::put('/posts/{id}', [AuthController::class,'updatePost']);
    // Route::delete('/posts/{id}', [AuthController::class,'deletePost']);

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}


// SQL QUERY TO MAKE CONSTAINT ONLY ONE WHERE USER CAN LIKE ONE POST
// ALTER TABLE likes ADD CONSTRAINT unique_user_post UNIQUE (user_id, post_id);