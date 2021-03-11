<?php

namespace App\Models\Homepage;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Model;

class WorksSection extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workSections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','summary','link','subHeadings',
        'meta_keywords','images','meta_keywords','meta_title',
        'meta_desc','lang','dep','subheadings'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

 protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array'
    ];


    public function children()
    {
        return $this->hasMany(WorksSection::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
