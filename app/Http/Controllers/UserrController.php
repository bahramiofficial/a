<?php

namespace App\Http\Controllers;

use App\Models\ActivationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserrController extends Controller
//todo php artisan make:controller
//todo email added
{
    public function activation($token)
    {

        $activationCode = ActivationCode::whereCode($token)->first();

        if (! $activationCode){
            return response()->json('not exist', Response::HTTP_NOT_FOUND);
        }

        if ($activationCode->expire < Carbon::now()){
            return \response()->json('expired', Response::HTTP_FORBIDDEN);

        }

        if ($activationCode->used == true){
            return \response()->json('used', Response::HTTP_BAD_REQUEST);
        }

        $activationCode->user()->update([
            'active' => 1
        ]);

        $activationCode->update([
           'used' => true
        ]);

        auth()->loginUsingId($activationCode->user->id);
        return redirect('/');
    }
}
