<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{


    protected $table = 'articlecategories';
    protected $guarded = ['id'];


    public function children()
    {
        return $this->hasMany(ArticleCategory::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
