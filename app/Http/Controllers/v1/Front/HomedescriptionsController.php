<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\HomedescriptionCollection;
use App\Models\Homepage\HomeDescription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class HomedescriptionsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function top(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new HomedescriptionCollection(HomeDescription::where('type', 'top')->where('lang', $lang)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function down(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new HomedescriptionCollection(HomeDescription::where('type', 'down')->where('lang', $lang)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }

    }


}
