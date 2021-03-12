<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{


    protected $table = 'cars';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'type',
          'color',
          'notes',
          'user_id',
          'appointment_id',
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
public function users(){
    return $this->belongsToMany(User::class);
}

/**
 * appointments car have
 *
 */
public function appointments(){
    return $this->belongsToMany(Appointment::class);
}


}
