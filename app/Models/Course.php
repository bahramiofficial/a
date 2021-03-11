<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //  use Sluggable;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
//    public function Sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }

    public function scopeSearch($query, $keywords)
    {
        $keywords = explode(' ', $keywords);
        foreach ($keywords as $keyword) {
            $query->whereHas('categories', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
                ->orWhere('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tags', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', 'LIKE', '%' . $keyword . '%')
                ->orWhere('slug', 'LIKE', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', '%' . $keyword . '%')
                ->orWhere('body', 'LIKE', '%' . $keyword . '%')
                ->orWhere('price', 'LIKE', '%' . $keyword . '%')
                ->orWhere('images', 'LIKE', '%' . $keyword . '%')
                ->orWhere('summery', 'LIKE', '%' . $keyword . '%')
                ->orWhere('kind', 'LIKE', '%' . $keyword . '%')
                ->orWhere('slugvoice', 'LIKE', '%' . $keyword . '%')
                ->orWhere('writer', 'LIKE', '%' . $keyword . '%')
                ->orWhere('speaker', 'LIKE', '%' . $keyword . '%')
                ->orWhere('review', 'LIKE', '%' . $keyword . '%')
                ->orWhere('pdf', 'LIKE', '%' . $keyword . '%')
                ->orWhere('voice', 'LIKE', '%' . $keyword . '%')
                ->orWhere('demovoice', 'LIKE', '%' . $keyword . '%')
                ->orWhere('dpdfCount', 'LIKE', '%' . $keyword . '%')
                ->orWhere('dvoiceCount', 'LIKE', '%' . $keyword . '%')
                ->orWhere('dpdfCount', 'LIKE', '%' . $keyword . '%')
                ->orWhere('linkb', 'LIKE', '%' . $keyword . '%')
                ->orWhere('meta_desc', 'LIKE', '%' . $keyword . '%')
                ->orWhere('meta_title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('meta_keywords', 'LIKE', '%' . $keyword . '%')
                ->orWhere('time', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }


    public function scopeFilter($query)
    {
        //all things that orders turn back category type kind order

        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if (isset($type) && trim($type) != '') {
            if (in_array($type, ['vip', 'cash', 'free'])) {
                $query->whereType($type);
            }
        }

        $kind = request('kind');
        if (isset($kind) && trim($kind) != '') {
            if (in_array($kind, ['book', 'podcast', 'radio', 'package'])) {
                $query->whereKind($kind);
            }
        }

        $low = request('low');
        if (isset($low) && trim($low) != '') {
            $query->where('price', '>=', $low);
        }

        $high = request('high');
        if (isset($high) && trim($high) != '') {
            $query->where('price', '<=', $high);
        }


        if (request('order') == 1) {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }


    public function scopeFilterPakage($query)
    {
        //all things that orders turn back category type kind order
        $query->whereKind('package');


        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if (isset($type) && trim($type) != '') {
            if (in_array($type, ['vip', 'cash', 'free'])) {
                $query->whereType($type);
            }
        }


        $low = request('low');
        if (isset($low) && trim($low) != '') {
            $query->where('price', '>=', $low);
        }

        $high = request('high');
        if (isset($high) && trim($high) != '') {
            $query->where('price', '<=', $high);
        }


        if (request('order') == 1) {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }

    public function scopeFilterBook($query)
    {
        //all things that orders turn back category type kind order
        $query->whereKind('book');


        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if (isset($type) && trim($type) != '') {
            if (in_array($type, ['vip', 'cash', 'free'])) {
                $query->whereType($type);
            }
        }


        $low = request('low');
        if (isset($low) && trim($low) != '') {
            $query->where('price', '>=', $low);
        }

        $high = request('high');
        if (isset($high) && trim($high) != '') {
            $query->where('price', '<=', $high);
        }


        if (request('order') == 1) {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }

    public function scopeFilterPodcast($query)
    {
        //all things that orders turn back category type kind order
        $query->whereKind('podcast');


        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if (isset($type) && trim($type) != '') {
            if (in_array($type, ['vip', 'cash', 'free'])) {
                $query->whereType($type);
            }
        }


        $low = request('low');
        if (isset($low) && trim($low) != '') {
            $query->where('price', '>=', $low);
        }

        $high = request('high');
        if (isset($high) && trim($high) != '') {
            $query->where('price', '<=', $high);
        }


        if (request('order') == 1) {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }

    public function scopeFilterRadio($query)
    {
        //all things that orders turn back category type kind order
        $query->whereKind('radio');


        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereId($category);
            });
        }

        $type = request('type');
        if (isset($type) && trim($type) != '') {
            if (in_array($type, ['vip', 'cash', 'free'])) {
                $query->whereType($type);
            }
        }


        $low = request('low');
        if (isset($low) && trim($low) != '') {
            $query->where('price', '>=', $low);
        }

        $high = request('high');
        if (isset($high) && trim($high) != '') {
            $query->where('price', '<=', $high);
        }


        if (request('order') == 1) {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = Str::limit(preg_replace('/<[^>]*>/', '', $value), 200);
        $this->attributes['body'] = $value;
    }


    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function path()
    { //todo add line 132
        $locale = app()->getLocale();
        return "/$locale/courses/$this->slug";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'coure_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
