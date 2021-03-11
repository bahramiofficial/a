<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\OfficeCollection;
use App\Models\Homepage\Office;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class OfficeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new OfficeCollection(Office::where('lang', $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null,Response::HTTP_BAD_REQUEST);
        }

    }
}
