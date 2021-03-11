<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentcolleaguesCollection extends ResourceCollection
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
                    'user_id' => $item->user_id,
                    'comment' => $item->comment,
                    'family' => $item->family,
                  'name' => $item->name,
                'score' => $item->score,
                'position' => $item->position,

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





