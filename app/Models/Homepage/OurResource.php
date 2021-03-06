<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class OurResource extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ourResources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images','link','company'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array'
    ];
}
