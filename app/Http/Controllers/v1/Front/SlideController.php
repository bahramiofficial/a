<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SlideCollection;
use App\Models\Homepage\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SlideController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'home')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function academy(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'academy')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function cooperationrequest(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'cooperationrequest')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function article(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'article')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function radio(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'radio')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function book(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'book')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function question(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'question')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }
    public function ide(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SlideCollection(Slide::where('type', 'ide')->where('lang' , $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null ,Response::HTTP_BAD_REQUEST);
        }

    }

}
