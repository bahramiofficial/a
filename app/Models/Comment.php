<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'comment',
        'approved',
        'coure_id',
        //todo
    ];


    /**
     * Get all of the owning commentable models.
     */



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class , 'coure_id' );
    }

    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = str_replace(PHP_EOL , "<br>" , $value);
    }


}
