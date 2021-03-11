<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SettingCollection;
use App\Models\Homepage\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $lang = app()->getLocale();
            return new SettingCollection(Setting::where('lang', $lang)->get());
        }catch (\Exception $exception){
            Log::error($exception);
            return response()->json(null,Response::HTTP_BAD_REQUEST);
        }

    }
}
