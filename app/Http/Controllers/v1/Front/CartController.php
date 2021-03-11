<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Shop\CartCollection;
use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function __construct()
    {
        auth()->loginUsingId(1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $carts = Cart::where('user_id', auth()->user()->id)->with('courses')->get();
            $courses = array();

            foreach ($carts as $cart) {
//                $cc  =$cart->courses;
//                dd($cc);
//                $x = [
//                    'id' =>   $cc->id,
//                    'type' =>   $cc->type,
//                    'title' =>   $cc->title,
//                    'link' =>   $cc->link,
//                    'summery' =>   $cc->summery,
//                    'images' =>   $cc->images,
//                    'meta_desc' =>   $cc->meta_desc,
//                    'meta_title' =>   $cc->meta_title,
//                    'meta_keywords' =>   $cc->meta_keywords,
//                ];
//                dd($x);
                array_push($courses, $cart->courses);
            }
            $course = array();
            foreach ($courses[0] as $cor){

                $x = [
                    'id' =>   $cor->id,
                    'type' =>   $cor->type,
                    'title' =>   $cor->title,
                    'link' =>   $cor->link,
                    'summery' =>   $cor->summery,
                    'images' =>   $cor->images,
                    'meta_desc' =>   $cor->meta_desc,
                    'meta_title' =>   $cor->meta_title,
                    'meta_keywords' =>   $cor->meta_keywords,
                ];

                array_push($course, $x);
            }
            return response()->json($course);
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function addCart($course_id)
    {

        $course = Course::Where('id', $course_id)->firstOrFail();

        if (is_null($course))
            return response()->json(null, 404);

        $item = array();
        if ($products = auth()->user()->carts()->with('courses')->first()) {
            foreach ($products->courses as $i) {
                array_push($item, $i->id);
            }
            if (in_array($course_id, $item))
                return response()->json(null, 429);
        }

//
//        auth()->user()->
        $csrt = Cart::where('user_id', auth()->user()->id)->firstOrCreate(['user_id' => auth()->user()->id,]);
        $csrt->courses()->attach($course_id);
        return response()->json(null, 200);
    }


    public function destroy($course_id)
    {
        try {

            $course = Course::Where('id', $course_id)->firstOrFail();

            if (is_null($course))
                return response()->json(null, 404);

            $item = array();
            if ($products = auth()->user()->carts()->with('courses')->first()) {
                foreach ($products->courses as $i) {
                    array_push($item, $i->id);
                }
                if (in_array($course_id, $item)) {

                    $csrt = Cart::where('user_id', auth()->user()->id)->first();
                    $csrt->courses()->detach($course_id);

                    return response()->json(null, Response::HTTP_OK);
                }

            }
            return response()->json(null, Response::HTTP_NOT_FOUND);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


}
