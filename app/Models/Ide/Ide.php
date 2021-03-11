<?php

namespace App\Models\Ide;

use Illuminate\Database\Eloquent\Model;

class Ide extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','family','numberId','nationalCode','born_at','phone','religion',
        'maritalStatus','gender','militaryService','nationality','mobile',
//Startup
       'category', 'startupname','startupdesc','startupproblem','startupfounders','startupcustomer','startuprival',
        'startupsocialnetwork','startupusersupport'

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
    ];

    public function info()
    {
        $this->hasMany(Info::class , 'ide_id');
    }

}
