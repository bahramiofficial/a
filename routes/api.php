<?php


use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Front\ArticleController;
use App\Http\Controllers\v1\Front\CartController;
use App\Http\Controllers\v1\Front\CommentcolleaguesController;
use App\Http\Controllers\v1\Front\CompanyinfoController;
use App\Http\Controllers\v1\Front\HomeController;
use App\Http\Controllers\v1\Front\HomedescriptionsController;
use App\Http\Controllers\v1\Front\InstagramController;
use App\Http\Controllers\v1\Front\OfficeController;
use App\Http\Controllers\v1\Front\OurresourcesController;
use App\Http\Controllers\v1\Front\QuestionanswerController;
use App\Http\Controllers\v1\Front\Shop\BookController;
use App\Http\Controllers\v1\Front\Shop\CourseController;
use App\Http\Controllers\v1\Front\Shop\PodcastController;
use App\Http\Controllers\v1\Front\Shop\RadioController;
use App\Http\Controllers\v1\Front\SlideController;
use App\Http\Controllers\v1\Front\worksectionController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\v1\Front\SettingController;
use \App\Http\Controllers\v1\Front\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//todo send or check lernieing  generit route fun
//todo add midellwer login active

//region all api

Route::group(['prefix' => 'v1'], function () {

    //region Auth

    Route::post('logincode', [AuthController::class, 'logincode']);
    Route::post('login', [AuthController::class, 'login']);
//    Route::post('logintest', [AuthController::class, 'logintest']);

    //endregion Auth

    //region Front
    Route::group(['namespace' => 'Front'], function () {

        //region company
        Route::get('company', [CompanyinfoController::class, 'index']);
        //endregion company

        //region instagram

        Route::get('instagram', [InstagramController::class, 'index']);

        //endregion instagram

        //region ourresources

        Route::get('ourresources', [OurresourcesController::class, 'index']);

        //endregion ourresources

        //region office

        Route::get('office', [OfficeController::class, 'index']);

        //endregion office

        //region homeDescription

        Route::get('homedesctop', [HomedescriptionsController::class, 'top']);
        Route::get('homedescdown', [HomedescriptionsController::class, 'down']);

        //endregion homeDescription


        //region worksection
        Route::group(['prefix' => 'worksection'], function () {
            //todo validate  send data


            Route::get('section', [worksectionController::class, 'index']);

            Route::get('subsection/all', [worksectionController::class, 'indexWorksSection']);//todo check

            Route::get('subsection/{parentid}', [worksectionController::class, 'subWorksSection']);//todo check

            Route::get('department', [worksectionController::class, 'departmentSection']);

            Route::get('company/{parentid}', [worksectionController::class, 'depSectionCompany']);//todo check

            Route::get('detailsworkssection/{slug}', [worksectionController::class, 'showDetailsWorksSection']);//todo check

        });

        Route::get('holdingMenu', [worksectionController::class, 'holdingMenu']);
        Route::get('subHoldingMenu', [worksectionController::class, 'subHoldingMenu']);


        //endregion worksection

        //region Commentcolleagues

        Route::get('commentcolleague', [CommentcolleaguesController::class, 'index']);

        //endregion Commentcolleagues

        //region  Slide

        Route::get('slide/home', [SlideController::class, 'home']);
        Route::get('slide/academy', [SlideController::class, 'academy']);
        Route::get('slide/cooperationrequest', [SlideController::class, 'cooperationrequest']);
        Route::get('slide/article', [SlideController::class, 'article']);
        Route::get('slide/radio', [SlideController::class, 'radio']);
        Route::get('slide/book', [SlideController::class, 'book']);
        Route::get('slide/question', [SlideController::class, 'question']);
        Route::get('slide/ide', [SlideController::class, 'ide']);

        //endregion  Slide

        //region Setting
        Route::get('setting', [SettingController::class, 'index']);
        //endregion


        //region Article

        Route::get('articles/category', [ArticleController::class, 'categoryR']);
        Route::get('articles', [ArticleController::class, 'articles']);
        Route::get('articles/{slug}', [ArticleController::class, 'single']);

        Route::group(['middleware' => 'auth:api'], function () {

            //todo create midellwer auth
            Route::post('comment', [ArticleController::class, 'comment']);//todo check

        });

        // endregion Article

        //region ide

        //todo create midellwer auth
        //todo test
        Route::post('/ide/create', 'Ide\IdeController@store');//todo check

        //endregion ide

        //region Recruitment
        //todo create midellwer auth
        //todo test
        Route::post('/recruitment/create', 'recruitmentController@store');//todo check

        //endregion Recruitment

        //region cart
        //todo create midellwer auth
        Route::get('cart', [CartController::class, 'index']);
        //endregion

        //region feed
        //Route::get('/feed/articles', [FeedController::class,'articles']);
        //endregion

        //region sitemap
        //Route::get('sitemap', [SitemapController::class ,'index']);
        //Route::get('sitemap-articles', [SitemapController::class ,'articles']);
        //endregion sitemap

        //region home
        Route::post('/search', [HomeController::class, 'search']);
        Route::post('/filter', [HomeController::class, 'filter']);
        //endregion home

//        Route::group( function () {
        Route::post('/course/payment', [CourseController::class, 'payment']);//todo check
        Route::get('/course/payment/checker', [CourseController::class, 'checker']);//todo check
//        });

        //region shop

        Route::get('questionanswer/{id}', [QuestionanswerController::class, 'index']);

        //todo course batad ba book avaz beshe
        Route::get('book', [BookController::class, 'index']);
        Route::get('book/{slug}', [BookController::class, 'single']);
        Route::get('book/download', [CourseController::class, 'download']);


        Route::get('podcast', [PodcastController::class, 'index']);
        Route::get('podcast/{slug}', [PodcastController::class, 'single']);
        Route::get('podcast/download', [CourseController::class, 'download']);


        Route::get('radio', [RadioController::class, 'index']);
        Route::get('radio/{slug}', [RadioController::class, 'single']);
        Route::get('radio/download', [CourseController::class, 'download']);


        Route::get('course', [CourseController::class, 'index']);
        Route::get('course/{slug}', [CourseController::class, 'single']);
        Route::get('course/episode/{slug}', [CourseController::class, 'episodeAll']);
        Route::get('course/questionanswer/{slug}', [CourseController::class, 'questionanswer']);


        Route::get('user/course', [UserController::class, 'allCourse']);
        Route::get('user/password', [UserController::class, 'chengePassword']);
        Route::get('user/uplodImage', [UserController::class, 'uplodImage']);


        Route::get('card/all', [CartController::class, 'index']);
        Route::get('card/addCard/{id}', [CartController::class, 'addCart']);//todo chek
        Route::get('card/destroy/{id}', [CartController::class, 'destroy']);//todo chek


        Route::get('course/comment/{id}', [CourseController::class, 'commentCourse']);//todo chek
        Route::post('course/createcomment', [CourseController::class, 'comment']);//todo check same up

        Route::get('course/download', [CourseController::class, 'download']);


        Route::post('course/episode/{id}', [CourseController::class, 'episode']);//todo check
        Route::post('course/checkbuy/{course_id}', [CourseController::class, 'checkBuy']);//todo check
        //endregion shop

        Route::post('user', [HomeController::class, 'user']);//todo check

//

        Route::post('stream', [HomeController::class, 'stream'])->name('stream');//todo check

        Route::get('stream', function () {
            $video_path = 'http://techslides.com/demos/sample-videos/small.mp4';
            $stream = new \App\VideoStream($video_path);

            return response()->stream(function () use ($stream) {
                $stream->start();
            });
            
        })->name('stream');


    });

    //endregion Front

});


//endregion all api


//فراگروپ کلش
//get
//course/payment/checker

