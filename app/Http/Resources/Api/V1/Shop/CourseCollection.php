<?php

namespace App\Http\Resources\Api\V1\Shop;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            $this->collection->map(function ($item) {
// safe avl
                return [
                    'id' => $item->id,
                    'type' => $item->type,
                    'title' => $item->title,
                    'link' => $item->slug,
                    'summery' => $item->summery,
                    'images' => $item->images,
//
//                    'price' => $item->price,
//                    'time' => $item->time,
//                    'viewCount' => $item->viewCount,
                    'meta_desc' => $item->meta_desc,
                    'meta_title' => $item->meta_title,
                    'meta_keywords' => $item->meta_keywords,

                ];

            })
        ];
    }

    public function with($request)
    {
        return [
            'status' => '200'
        ];
    }


}





























