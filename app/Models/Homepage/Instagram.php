<?php

namespace App\Models\Homepage;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $primaryKey = "id";
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instagrams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link', 'images', 'user_id', 'title', 'meta_desc',
        'meta_title', 'meta_keywords'

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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
