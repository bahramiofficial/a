<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\H;

class AllSettingController extends Controller
{
    //set language by salar
    public function sLang(Request $request, $lang)
    {
        if (H::getLang($lang)) {
            return response()->json(H::getLang(), 200);
        } else {
            return response()->json(H::getLang(), 402);
        }
    }


    public function gLang()
    {
        return response()->json(H::getLang(), 200);
    }
}
