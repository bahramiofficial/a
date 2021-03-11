<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SlideCollection extends ResourceCollection
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
                return [
                    'id'=>$item->id,
                    'bigTitle' => $item->title1,
                    'subTitle' => $item->title2,
                    'motto' => $item->title3,
                    'subMotto' => $item->description,
                    'src' => $item->images,
                    'type' => $item->type,
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
