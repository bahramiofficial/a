<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HomedescriptionCollection extends ResourceCollection
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
                    'title' => $item->title,
                    'description' => $item->description,
                    'summary' => $item->summary,
                    'link' => $item->link,
                    'images1' => $item->images1,
                    'images2' => $item->images2,
                    'images3' => $item->images3,
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
