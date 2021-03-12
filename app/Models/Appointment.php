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
         'due_at',
         'status',
        'notes',
        'user_id',
        'car_id',
        'service_id',
        'notification_id',
    ];


    // status vars
    const STATUS_PENDING = 0;
   const STATUS_ACTIVE = 1;
   const STATUS_CANCELED = 2;



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
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
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
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function notification(){
    return $this->hasOne(Notification::class);
}




/**
 * notifications for this appointment
 *
 */
public function service(){
    return $this->hasOne(Service::class);
}


}
