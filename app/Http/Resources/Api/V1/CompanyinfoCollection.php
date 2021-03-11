<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyinfoCollection extends ResourceCollection
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
                    'humanresourse' => $item->humanresourse,
                    'year' => $item->year,
                    'customercompetition' => $item->customercompetition,
                    'ongoingproject' => $item->ongoingproject,
                    'projectdone' => $item->projectdone,

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
