<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;    // add this 
use App\Models\Media;

class User extends Authenticatable implements JWTSubject // implement the JWTSubject
{
    use HasFactory, Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_is_admin' => 'boolean'
    ];

    // add two methods below

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile_photo(){
        $profphoto = $this->hasOne(Media::class,'media_id','profile_photo_id');
        return $profphoto;
    }

    // call profilePhoto every time we call user
    protected $appends = ['profile_photo'];

    public function getProfilePhotoAttribute(){
        // check if no photo return {
                    //     "media_id": null,
                    //     "user_id": 3,
                    //     "file_path": "/images/no-profile-pic.jpeg",
                    //     "created_at": null,
                    //     "updated_at": null
                    // }
        $tmp = $this->profile_photo();
        if(!$tmp || !$tmp->exists()){
            return Media::where('file_path','/images/no-profile-pic.jpeg')->first();
        }
        return $tmp->first();
    }



}