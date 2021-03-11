<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SettingCollection extends ResourceCollection
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

                    'educationalpack' => $item->educationalpack,
                    'educationalarticles' => $item->educationalarticles,
                    'ebook' => $item->ebook,
                    'podcast' => $item->podcast,
                    'newsarticles' => $item->newsarticles,
                    'khabarname' => $item->khabarname,
                    'img' => $item->img,
                    'cooperation' => $item->cooperation,
                    'voicebook' => $item->voicebook,
                    'latest' => $item->latest,
                    'usualquestions' => $item->usualquestions,
                    'acceptidea' => $item->acceptidea,
                    'logo' => $item->logo,
                    'title' => $item->title,
                    'homedesctop' => $item->homedesctop,
                    'worksection' => $item->worksection,
                    'dep' => $item->dep,
                    'article' => $item->article,
                    'homedescdown' => $item->homedescdown,
                    'ourresources' => $item->ourresources,
                    'instagram' => $item->instagram,
                    'coleagesuggecstions' => $item->coleagesuggecstions,
                    'contactus' => $item->contactus,
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
