<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participator extends Model
{
    protected $table = 'participators';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
         'name',
         'img',
        'service_points',
        'service_img',
        'notes',
        'services_date',
    ];




/*
|--------------------------------------------------------------------------
| Relations
|--------------------------------------------------------------------------
*/




}
