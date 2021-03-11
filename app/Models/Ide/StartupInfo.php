<?php

namespace App\Models\Ide;

use Illuminate\Database\Eloquent\Model;

class StartupInfo extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'StartupInfos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','desc','problem','founders','customer','rival',
        'socialnetwork','usersupport'
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
}
