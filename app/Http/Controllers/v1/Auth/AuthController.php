<?php

namespace App\Http\Controllers\v1\Auth;

use App\H;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\GenerateCodeForUserAuth;
use App\Models\User;
use Carbon\Carbon;


//use Illuminate\Support\Facades\Validator;
use http\Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Trez\RayganSms\Facades\RayganSms;

class AuthController extends Controller
{
    //region generateCode
    private $H;

    public function generateCode($user)
    {
        try {
            $code = random_int(1000, 9999);
            $expirationTime = now()->addMinutes(env('LOGIN_CODE_EXPIRATION_DURATION_IN_MINUTES', 5));

            $user->code = $code;
            $user->expire_at = $expirationTime;
            $user->save();
            $message = 'کد تایید شما در سرافراز ' . $code;
            RayganSms::sendMessage($user->mobile, $message);

            return response('send code', Response::HTTP_OK);

//             event(new GenerateCodeForUserAuth($user, $code));

            return true;

        } catch (Exception $exception) {
            return false;
        }


    }
    //endregion generateCode

    //region logincode
    public function logincode(Request $request)
    {

//        $validator = $request->validate([
//            'mobile' => ['required', 'unique:users'],
//        ]);
////
//
//
//        if ($validator->fails()) {
//            return response(null, Response::HTTP_BAD_REQUEST);
//        }
//        else {
        //


        $validator = Validator::make($request->all(), [ // <---
            'mobile' => 'required|unique:users',
        ]);

        if ($validator->fails()) {
            return response(null, Response::HTTP_BAD_REQUEST);

        }
        if (!$this->isMobile($request->mobile)) {
            return response(null, Response::HTTP_BAD_REQUEST);
        } else {


            //todo $request->mobile = mobile_is_valid

            $mobile = $request->mobile;
//         $mobile =  H::toMobile($request->mobile);
            try {
                if (!$user = User::where('mobile', $mobile)->first()) {
                    $user = User::create([
                        'mobile' => $mobile
                    ]);
                    log::info($user . 'created');
                }
                if ($user) {
                    if ($this->generateCode($user)) {
                        return response('code was made', Response::HTTP_CREATED);//201
                    } else {
                        return response('code wan not made', Response::HTTP_INTERNAL_SERVER_ERROR);//500
                    }
                }
            } catch (Exception $exception) {
                log::error($exception);
                return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

//        }
    }

    //     }
    //endregion logincode

    //region login
    public function login(Request $request)
    {
//        $mobile = $request->mobile;
//        $mobile =  H::toMobile($request->mobile);

        //todo $request->mobile = mobile_is_valid
        $user = User::where('mobile', $request->mobile)->first();

        if ($user) {

            if ($user->code == $request->code) {

                if ($user->expire_at >= Carbon::now() || true) {
                    log::info($user . 'login was successfully');
                    $tokenResult = $user->createToken('authToken')->plainTextToken;
//                    if ($request->remember_me)
//                        $tokenResult->save();
                    if (!$user->active)
                        $user->active = true;

                    return response()->json([

                        'status_code' => 200,
                        'access_token' => 'Bearer ' . $tokenResult
                    ]);


                } else {
                    //todo ok
                    //todo time shoma tamoom shode
                    log::error('Times Doesn\'t match');
                    return response('timeout', 422);
                }

            } else {
                //todo ok
                //todo code eshtabh ast
                log::error('Code Doesn\'t match');
                $response = ['Code Doesn\'t match'];
                return response($response, 422);
            }


        } else {
            $this->logincode($request);
        }
    }
    //endregion login

    //region isMobile
    public static function isMobile(?string $value): bool
    {
        return (bool)preg_match('~^(((\+|00)?98)|0)?9\d{9}$~', $value);
    }
    //endregion isMobile

    //region toMobile
    public static function toMobile(?string $value): ?string
    {
        return H::isMobile($value)
            ? '+98' . Str::substr($value, Str::length($value) - 10, 10)
            : null;
    }
    //endregion toMobile

    //*********************************************************

    // test
    //region getcodetest
    public function getcodetest($mobile)
    {
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            return response()->json(['status_code' => 200, 'code' => $user->code]);
        }
    }
    //endregion getcodetest

    //region logintest
    public function logintest(Request $request)
    {


        $user = User::first();
        if ($user) {
            //        if (!$user->active)
//            $user->active == true;
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => 'Bearer ' . $tokenResult,
//            'mobile' => User::all()
            ]);
            $tokenResult->save();
//send token - return token - save token
        }


    }
    //endregion logintest

    //********************************************************


    //region loginEmail
    public function loginEmail(Request $request)
    {
        try {
            $validator = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response(null, Response::HTTP_BAD_REQUEST);
            } else {
                $user = User::where('email', $request->email)->first();
                if ($user) {

                    if (Hash::check(Hash::make($request->password), $user->password) && $request->email == $user->email) {
                        $tokenResult = $user->createToken('authToken')->plainTextToken;
                        $tokenResult->save();
                        return response()->json([
                            'status_code' => 200,
                            'access_token' => 'Bearer ' . $tokenResult
                        ]);


                        return \response()->json('Login Successfully', Response::HTTP_OK);
                    }
                }

            }

        } catch (\Exception $exception) {
            return \response('Login Failed', Response::HTTP_BAD_REQUEST);
        }
    }
    //endregion loginEmail

    //region registerEmail
    public function registerEmail(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'name' => 'required'
            //todo all fild
        ]);
        if ($validator->fails()) {
            return response(null, Response::HTTP_BAD_REQUEST);
        } else {
            $user = User::where('email', $request->email)->first();
            if (!$user) {

//                    $user = new User();
//                    $user->email =>  todo
//                    $user->mobile =>
//                    $user->password = Hash::make($request->password);
                $user->save();

                // todo event send mail

                return \response()->json('Login Successfully', Response::HTTP_CREATED);

            }

// roocket vido
        }
        //todo try pskidsm


    }

    //endregion registerEmail


    public function logout()
    {
        $user = auth()->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }

}
