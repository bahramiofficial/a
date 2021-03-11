<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class HomeDescription extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'HomeDescriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','Description','summary','link','images1','images2','images3','type',
        'meta_desc','meta_title','meta_keywords'
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
        'images1' => 'array',
        'images2' => 'array',
        'images3' => 'array',
    ];
}
