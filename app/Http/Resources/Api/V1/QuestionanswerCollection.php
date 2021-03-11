<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionanswerCollection extends ResourceCollection
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
                    'course_id' => $item->course_id,

                    'why' => $item->why,
                    'benefit' => $item->benefit,
                    'hours' => $item->hours,
                    'lessonG' => $item->lessonG,
                    'lessonInfo' => $item->lessonInfo,

                    'cwhy' => $item->cwhy,
                    'cbenefit' => $item->cbenefit,
                    'clessonG' => $item->clessonG,
                    'chours' => $item->chours,
                    'clessonInfo' => $item->clessonInfo,

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
