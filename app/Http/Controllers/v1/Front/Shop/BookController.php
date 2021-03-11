<?php

namespace App\Http\Controllers\v1\Front\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Shop\CourseCollection;
use App\Http\Resources\Api\V1\Shop\OtherSingleCollection;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use \Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {

        try {
            $lang = app()->getLocale();
            return new CourseCollection(Course::FilterBook()->where('lang', $lang)->get());
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function single($slug)
    {
        try {
            $lang = app()->getLocale();
            return new OtherSingleCollection(Course::where('kind', 'book')->where('lang', $lang)->where('slug', $slug)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


}
