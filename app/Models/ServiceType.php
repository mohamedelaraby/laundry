<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'service_types';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'name',
         'description',
         'points',
        'price_id',
        'service_id',
    ];

/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * Service type belongs  to service
 */
public function service(){
    return $this->belongsTo(Service::class);
}


/**
 * Prices for this service type
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function prices(){
    return $this->hasMany(Price::class);
}

}
