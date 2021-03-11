<?php

namespace App\Http\Controllers\v1\Front\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Shop\CourseCollection;
use App\Http\Resources\Api\V1\Shop\CourseSingleCollection;
use App\Http\Resources\Api\V1\Shop\EpisodeCollection;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Learning;
use App\Models\Payment;
use App\Models\Questionanswer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    protected $MerchantID = 'f83cc956-f59f-11e6-889a-005056a205be'; //Required //todo change MerchantID

    public function index()
    {
        try {
            $lang = app()->getLocale();
            return new CourseCollection(Course::FilterPakage('kind', 'package')->where('lang', $lang)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function single($slug)
    {
        try {
            $lang = app()->getLocale();
            return new CourseSingleCollection(Course::where('kind', 'package')->where('lang', $lang)->where('slug', $slug)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function questionanswer($slug)
    {
        try {

            $course = Course::where('kind', 'package')->where('slug', $slug)->get();
            $question = Questionanswer::Where('course_id', $course[0]->id)->get();

            return response()->json($question, 200);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


    public function commentCourse($id)
    {
        try {
            return response()->json(Comment::where('course_id', $id)->where('approved', 1)->with('user')->get(), 200);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function payment()
    {

        $sumPrice = 0;
        $arryId = array();
        $carts = auth()->user()->cards()->where('close' == 0)->get();
        foreach ($carts as $cart) {
            $course = Course::findOrFail($cart->course_id);
            if ($course->price == 0) {
                // add lerning todo
            } else {
                if (auth()->user()->checkLearning($course->id)) {
                    //delete todo
                } else {
                    array_push($arryId, $course->id);
                    $sumPrice = $sumPrice + $course->price;
                }
            }

        }


//        if ($course->price == 0 && $course->type == 'vip') {
//            /*alert()->error('این دوره قابل خریداری توسط شما نیست','دقت کنید')->persistent('خیلی خوب');*/
////            return back();
//            return \response()->json('این دوره قابل خریداری توسط شما نیست', Response::HTTP_BAD_REQUEST);
//
//        }
//todo all corese

        $price = $sumPrice;

        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = auth()->user()->email; // Optional
        $Mobile = auth()->user()->mobile; // Optional
        $CallbackURL = 'http://localhost:8000/course/payment/checker'; // Required  //todo change CallbackURL

        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $price,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,//todo
                'CallbackURL' => $CallbackURL,
            ]
        );

        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
//1 , 2,3,4,5

            auth()->user()->payments()->create([
                'resnumber' => $result->Authority,
                'price' => $sumPrice,
                'course_id' => $arryId[0]
            ]);

            return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
//            echo 'ERR: ' . $result->Status;
            return \response()->json('ERR: ' . $result->Status, Response::HTTP_BAD_REQUEST);//todo status change
        }
    }

    public function ar()
    {
//        $a
//        foreach (items as $item){
//            [
//                'resnumber' => $result->Authority,
//                'price' => $sumPrice,
//                'course_id' => $arryId[0]
//            ]
//todo pyment
//        }

    }

    public function checker()
    {
        $Authority = request('Authority');

        $payment = Payment::whereResnumber($Authority)->firstOrFail();
        $course = Course::findOrFail($payment->course_id);


        if (request('Status') == 'OK') {
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->price,
                ]
            );

            if ($result->Status == 100) {
                if ($this->AddUserForLearning($payment, $course)) {

                    try {
                        //todo remove all card after
                        $cart = Cart::Whrer('user_id', auth()->user()->id)->get();
                        $cart->delete();
                        return response()->json(null, Response::HTTP_OK);
                    } catch (\Exception $exception) {

                        Log::error($exception);
                        return response()->json(null, Response::HTTP_BAD_REQUEST);

                    }

                    /*alert()->success('عملیات مورد نظر با موفقیت انجام شد','با تشکر');*/
//                    return redirect($course->path());
                    return \response()->json('عملیات مورد نظر با موفقیت انجام شد' . Response::HTTP_OK);
                }
            } else {
//                echo 'Transaction failed. Status:'.$result->Status;
                return \response()->json('تراکنش ناموفق' . Response::HTTP_BAD_REQUEST);//todo status change

            }
        } else {
//            echo 'Transaction canceled by user';
            return \response()->json('عملیات پرداخت توسط کاربر کنسل شد' . Response::HTTP_BAD_REQUEST);//todo status change

        }

    }

    protected function AddUserForLearning($payment, $course)
    {
        $payment->update([
            'payment' => 1
        ]);

        Learning::create([
            'user_id' => auth()->user()->id,
            'course_id' => $course->id
        ]);

        return true;
    }

    public function download(Episode $episode)
    {
        $hash = 'fds@#T@#56@sdgs131fasfq' . $episode->id . request()->ip() . request('t');

        if (Hash::check($hash, request('mac'))) {

            //return response()->download(storage_path($episode->videoUrl));
            return response()->redirectTo($episode->videoUrl);

        } else {

            return response()->json('لینک دانلود شما از کار افتاده است', Response::HTTP_BAD_REQUEST);

        }


    }

    public function checkBuy(Request $request, $course_id)
    {
        return auth()->user()->checkLearning($course_id);
    }


    public function episode($id)
    {
        try {
            return new EpisodeCollection(Episode::where('id', $id)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function episodeAll($slug)
    {
        try {
            $course = Course::where('kind', 'package')->where('slug', $slug)->get();
            return new EpisodeCollection(Episode::Where('course_id', $course[0]->id)->get());

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


    public function comment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'comment' => 'required',
                'course_id' => 'required'
            ]);

            if ($validator->fails()) {

                if ($request->parent_id) {
                    auth()->user->comment()->create([
                        'comment' => $request->comment,
                        'comment' => $request->parent_id,
                    ]);
                } else {
                    auth()->user->comment()->create([
                        'comment' => $request->comment,
                    ]);
                }

                return response()->json(null, 200);

            }
        } catch (\Exception $exception) {

            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);

        }

        //  todo roote coment save  shop
    }


}
