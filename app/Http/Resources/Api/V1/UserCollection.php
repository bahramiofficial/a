<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
                    'id' => $item->id,
                    'name' => $item->name,
                    'images' => $item->images,
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
