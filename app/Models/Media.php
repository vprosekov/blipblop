<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = "media";
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'user_id',
        'file_path'
    ];
}
