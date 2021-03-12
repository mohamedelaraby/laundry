<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'price',
         'points',
        'car_id',
    ];

/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * Service type 
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function serviceType(){
    return $this->belongsTo(ServiceType::class);
}

/**
 * Service type belongs  to service
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function car(){
    return $this->belongsTo(Car::class);
}

}
