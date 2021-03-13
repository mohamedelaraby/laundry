<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'appointments';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'release_date',
        'expire_date',
        'code',
        'notes',
        'user_id',
        'car_id',
        'service_id',
        'notification_id',
    ];


/*
|--------------------------------------------------------------------------
| Attributes inspectors
|--------------------------------------------------------------------------
*/

 /**
     *  Change status attributes name
     *
     *  @return void
     */
    public function getStatus(){
        if($this->status == 0){
            return trans('admin.pending');
        } else if($this->status == 1){
            return trans('admin.current');
        } else {
            return trans('admin.canceled');
        }
      }


/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * Cars user have
 *
 */
public function user(){
    return $this->belongsTo(User::class);
}

/**
 * Car for this appointment
 *
 */
public function car(){
    return $this->belongsTo(Car::class);
}

/**
 * notifications for this appointment
 */
public function notification(){
    return $this->hasOne(Notification::class);
}

/**
 * notifications for this appointment
 */
public function services(){
    return $this->hasMany(Service::class);
}


}
