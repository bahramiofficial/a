<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionanswer extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array'
    ];

    protected $fillable =[

    ];

    public function course()
    {
        return $this->belongsTo(Course::class );
    }
}
