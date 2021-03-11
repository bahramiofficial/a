<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Slides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title1','title2','title3','description','images','type',
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
