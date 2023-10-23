<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $primaryKey = 'activity_id';
    protected $table = "activitylog";
    protected $fillable = [
        'user_id',
        'activity_method',
        'activity_url',
        'activity_data'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function userActivities()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
