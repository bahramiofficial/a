<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OfficeCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [

             $this->collection->map(function ($item) {
                return [
                    'id'=>$item->id,
                    'country' => $item->country,
                    'address' => $item->address,
                    'Phone' => $item->Phone,
                    'email' => $item->email,
                    'lat' => $item->lat,
                    'lng' => $item->lng,
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
