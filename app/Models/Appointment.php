<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'date_from',
         'date_to',
        'notes',
        'user_id',
        'car_id',
        'service_id',
        'notification_id',
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
public function user(){
    return $this->belongsTo(User::class);
}

/**
 * Car for this appointment
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function car(){
    return $this->hasOne(Car::class);
}

/**
 * points for this appointment
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function points(){
    return $this->hasMany(Point::class);
}

/**
 * notifications for this appointment
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function notification(){
    return $this->hasOne(Notification::class);
}


}
