<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{


    protected $table = 'points';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'points_used',
         'points_unused',
         'points_total',
        'user_id',
        'service_id',
        'participator_id',
        'notes',
    ];


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
public function services(){
    return $this->belongsTo(Service::class);
}

/**
 * points for this appointment
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function participators(){
    return $this->belongsTo(Participator::class);
}



}
