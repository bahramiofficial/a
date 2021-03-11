<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'educationalpack','logo',
        'educationalarticles','title',
        'ebook','homedesctop',
        'podcast','worksection',
        'newsarticles','dep',
        'khabarname','article',
        'img','homedescdown',
        'cooperation','ourresources',
        'voicebook','instagram',
        'latest','coleagesuggecstions',
        'usualquestions','contactus',
        'acceptidea','lang',

    ];
    protected $casts = [
        'images' => 'array'
    ];
}
