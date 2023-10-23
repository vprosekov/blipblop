<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsMedia extends Model
{
    use HasFactory;
    protected $table = "posts_media";
    protected $primaryKey = 'posts_media_id';
    protected $fillable = [
        'post_id',
        'media_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
