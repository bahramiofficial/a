<?php

namespace App\Models\Ide;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','family','born_at','orientation','roleGroup'
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
    public function ide()
    {
        $this->belongsTo(Ide::class);
    }
}
