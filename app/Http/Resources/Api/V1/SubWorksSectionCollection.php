<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubWorksSectionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            $this->collection->map(function ($item) {

                return [
                    'id'=>$item->id,
                    'title' => $item->title,
                    'summary' => $item->summary,
                    'link' => $item->link,
                    'images' => $item->images,
                    'meta_desc' => $item->meta_desc,
                    'meta_title' => $item->meta_title,
                    'meta_keywords' => $item->meta_keywords,
                    'images' => $item->images,

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
