<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    protected $fillable = [
        'user_id',
        'course_id'
    ];
}
