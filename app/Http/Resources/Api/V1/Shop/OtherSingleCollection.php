<?php

namespace App\Http\Resources\Api\V1\Shop;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OtherSingleCollection extends ResourceCollection
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
                    'kind' => $item->kind,
                    'title' => $item->title,
                    'link' => $item->slug,
                    'info' => $item->summery,
                    'information' => $item->body,
                    'price' => $item->price,
                    'slugvoice' => $item->slugvoice,
                    'author' => $item->writer,
                    'speaker' => $item->speaker,
                    'pdf' => $item->pdf,
                    'demovoice' => $item->demovoice,
                    'dl' => '#',
                    'dl2' => '#',
                    'score' => $item->score,
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





























