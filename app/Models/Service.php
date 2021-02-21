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
         'name',
         'type',
         'notes',
        'point_id',
        'user_id',
    ];


/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/

/**
 * user which have take service
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function user(){
    return $this->belongsTo(User::class);
}

/**
 * points which have belongs to service
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function points(){
    return $this->hasMany(Point::class);
}


}
