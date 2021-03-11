<?php

namespace App\Models\Homepage;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CommentColleague extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commentcolleagues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','family','name','score','position'
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
