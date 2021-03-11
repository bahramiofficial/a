<?php

namespace App\Http\Controllers\v1\Front;
use App\VideoStream;
use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Models\Article;
use App\Models\Course;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use SEO;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{
    public function __construct()
    {
        auth()->loginUsingId(1);
    }


    public function stream(\Illuminate\Support\Facades\Request $request)
    {

    }

    function user()
    {
        $user = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'mobile' => auth()->user()->mobile,
            'images' => auth()->user()->photo,
        ];
        return response()->json($user, 200,);
    }

    public function index()
    {
        $locale = app()->getLocale();

        if (cache()->has("articles.$locale")) {
            $articles = cache('articles.' . $locale);
        } else {
            $articles = Article::whereLang($locale)->latest()->take(8)->get();
            cache(["articles.$locale" => $articles], Carbon::now()->addMinutes(0));
        }

        if (cache()->has('courses')) {
            $courses = cache('courses');
        } else {
            $courses = Course::latest()->take(4)->get();
            cache(['courses' => $courses], Carbon::now()->addMinutes(0));
        }
        $articles = Article::whereLang($locale)->latest()->take(8)->get();

        $courses = Course::latest()->take(4)->get();
        return view('Home.index', compact('articles', 'courses'));
    }

    public function search()
    {
        try {

            $keyword = request('search');
            $articles = Article::search($keyword)->get();
            return \response()->json($articles, Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::error($exception);
            return \response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


    public function filter(\Illuminate\Http\Request $request)
    {

        try {

            $course = Course::filter()->get();

            return $course;

            return \response()->json($articles, Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::error($exception);
            return \response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }


    public function comment()
    {
        try {
            $this->validate(request(), [
                'comment' => 'required|min:5',
            ]);

            auth()->user()->comments()->create(\request()->all());
            return response()->json(null, Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }
}
