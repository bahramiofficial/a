<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SubWorksSectionCollection;
use App\Http\Resources\Api\V1\worksectionCollection;
use App\Models\Homepage\WorksSection;
use http\Env\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class worksectionController extends Controller
{

    public function holdingMenu()
    {
        //name / slug //todo menu
        try {
            $lang = app()->getLocale();
            $ho = WorksSection::where('parent_id', null)->
            where('dep', 0)->where('lang', $lang)->get();
            $holding = array();
            foreach ($ho as $h) {
                $hh = [
                    'id' => $h->id,
                    'parent_id' => $h->parent_id,
                    'title' => $h->title,
                    'link' => $h->link,
                ];
                array_push($holding, $hh);
            }
            return response()->json($holding, 200);
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    public function subHoldingMenu()
    {
        //name / slug //todo menu
        try {
            $lang = app()->getLocale();
            $ho = WorksSection::where('parent_id','!=', null)->
            where('dep', 0)->where('lang', $lang)->get();
            $holding = array();
            foreach ($ho as $h) {
                $hh = [
                    'id' => $h->id,
                    'parent_id' => $h->parent_id,
                    'title' => $h->title,
                    'link' => $h->link,
                ];
                array_push($holding, $hh);
            }
            return response()->json($holding, 200);
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    public function index()
    {
// name title body
        try {
            $lang = app()->getLocale();
            return new worksectionCollection(WorksSection::where('parent_id', null)->
            where('dep', 0)->where('lang', $lang)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }


    public function indexWorksSection(Request $request)
    {
        //todo route api/v1/worksection/subsection/all not work

        try {
            $lang = app()->getLocale();
            return new SubWorksSectionCollection(WorksSection::where('parent_id', '!=', null)->where('dep', 0)->where('lang', $lang)->get());
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    public function subWorksSection($parentid)
    {
        try {
            $lang = app()->getLocale();
            return new SubWorksSectionCollection(WorksSection::where('parent_id', $parentid)->where('lang', $lang)->get());
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    public function departmentSection()
    {
        try {
            $lang = app()->getLocale();
            return new worksectionCollection(WorksSection::where('dep', 1)->where('lang', $lang)->get());
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    public function depSectionCompany($parentid)
    {
        try {
            $lang = app()->getLocale();
            return new worksectionCollection(WorksSection::where('parent_id', $parentid)
                ->where('dep', 1)->where('lang', $lang)->get());
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }


    public function showDetailsWorksSection($slug)
    {
        try {
            $lang = app()->getLocale();
            return new worksectionCollection(WorksSection::where('slug', $slug)->where('lang', $lang)->first());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }


}
