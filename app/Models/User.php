<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_name',
         'email',
          'password',
          'phone',
          'img',
          'code',
          'notes',
          'created_by',
          'point_id',
          'car_id',
          'notification_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * Cars user have
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function cars(){
    return $this->hasMany(Car::class);
}

/**
 * notifications user have
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function notifications(){
    return $this->hasMany(Notification::class);
}

/**
 * points user have
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function points(){
    return $this->hasMany(Point::class);
}

/**
 * Services user have
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function services(){
    return $this->hasMany(Service::class);
}


}
