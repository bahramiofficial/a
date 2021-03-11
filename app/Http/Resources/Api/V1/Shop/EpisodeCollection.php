<?php

namespace App\Http\Resources\Api\V1\Shop;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EpisodeCollection extends ResourceCollection
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
                    'type' => $item->type,
                    'title' => $item->title,
                    'link' => $item->slug,
                    'time' => $item->time,
                    'number' => $item->number,
                    'datepublish' => $item->datepublish,
                    'publish' => $item->publish,

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





























