<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'cars';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'body',
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
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function appointments(){
    return $this->belongsToMany(appointments::class);
}
}
