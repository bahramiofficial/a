<?php

namespace App\Http\Resources\Api\V1\Shop;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Course2Collection extends ResourceCollection
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
                    'slug' => $item->slug,
                    'description' => $item->description,
                    'body' => $item->body,
                    'price' => $item->price,
                    'images' => $item->images,
                    'tags' => $item->tags,
                    'metadescription' => $item->metadescription,
                    'time' => $item->time,
                    'viewCount' => $item->viewCount,
                    'commentCount' => $item->commentCount,
                    'kind' => $item->kind,
                    'summery' => $item->summery,
                    'slugvoice' => $item->slugvoice,
                    'writer' => $item->writer,
                    'speaker' => $item->speaker,
                    'review' => $item->review,
                    'pdf' => $item->pdf,
                    'voice' => $item->voice,
                    'demovoice' => $item->demovoice,
                    'dpdfCount' => $item->dpdfCount,
                    'dvoiceCount' => $item->dvoiceCount,
                    'Countplaydemo' => $item->Countplaydemo,
                    'Countclickb' => $item->Countclickb,
                    'score' => $item->score,
                    'linkb' => $item->linkb,
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
