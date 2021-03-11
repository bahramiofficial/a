<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\QuestionanswerCollection;
use App\Models\Questionanswer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class QuestionanswerController extends Controller
{
    public function index($id)
    {
        try {
            $lang = app()->getLocale();
            return new QuestionanswerCollection(Questionanswer::where('course_id',$id)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null,Response::HTTP_BAD_REQUEST);
        }

    }
}
