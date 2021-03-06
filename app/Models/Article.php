<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
//    use Sluggable , Searchable;



    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'tags' => $this->tags,
            'create_at' => $this->created_at,
            'categories' => $this->categories
        ];
    }

    public function scopeSearch($query , $keywords)
    {

        $keywords = explode(' ',$keywords);
        foreach ($keywords as $keyword) {
            $query->whereHas('categories' , function ($query) use ($keyword){
                $query->where('name' , 'LIKE' , '%' . $keyword . '%' );
            })
                ->orWhere('title' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('slug' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('lang' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('description' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('body' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('images' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('tags' , 'LIKE' , '%' . $keyword . '%');
        }
        return $query;
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }
    public function path()
    {
        $locale = app()->getLocale();
        return "/$locale/articles/$this->slug";
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function articlecategory()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
