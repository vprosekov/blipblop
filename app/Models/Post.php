<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';
    protected $table = "posts";
    protected $fillable = [
        'user_id',
        'content'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    // Route::post('/posts', [AuthController::class,'createPost']);
    // Route::get('/posts', [AuthController::class,'getNewsFeed']);
    // Route::put('/posts/{id}', [AuthController::class,'updatePost']);
    // Route::delete('/posts/{id}', [AuthController::class,'deletePost']);

    public function user()
    {
        // return info from Users and media info from Media where profile_photo_id
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        // return users info
        return $this->hasMany(Like::class, 'post_id');
    }
    public function likedByAuthUser(){
        // return if there like with auth user id and this post id
        $like = $this->likes()->where('user_id', auth()->user()->id)->first();
        if ($like) {
            return true;
        }
        return false;
    }
    public function media()
    {
        // return PostsMedia info
        $postmedias = $this->hasMany(PostsMedia::class, 'post_id');
        if ($postmedias->count() > 0) {
            $postmedias = $postmedias->first();
            $media = $postmedias->media();
            return $media;
        }
        return null;
    }
}
