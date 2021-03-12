<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'min_time',
         'max_time',
         'notes',
        'user_id',
        'type_id',
    ];


/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * user which have take service
 *
 */
public function user(){
    return $this->belongsTo(User::class);
}

/**
 * service Types which have belongs to service
 *
 */
public function types(){
    return $this->hasMany(ServiceType::class);
}


}
