<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\Home\CommentColleaguesController;
use App\Http\Controllers\Admin\Home\CompanyInfoController;
use App\Http\Controllers\Admin\Home\CompanySarafrazController;
use App\Http\Controllers\Admin\Home\DepController;
use App\Http\Controllers\Admin\Home\HoldingController;
use App\Http\Controllers\Admin\Home\HomeDescriptionsController;
use App\Http\Controllers\Admin\Home\InstagramController;
use App\Http\Controllers\Admin\Home\OfficeController;
use App\Http\Controllers\Admin\Home\OurresourceController;
use App\Http\Controllers\Admin\Home\RecruitmentController;
use App\Http\Controllers\Admin\Home\SlideController;
use App\Http\Controllers\Admin\LevelManageController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Shop\BookController;
use App\Http\Controllers\Admin\Shop\PodcastController;
use App\Http\Controllers\Admin\Shop\RadioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Trez\RayganSms\Facades\RayganSms;
use \App\Http\Controllers\Admin\Shop\QuestionanswerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('sms', function (){
   echo RayganSms::sendMessage('09175175771', 'تست پنل اس ام اس توسط تیم فنی سرافراز') ;
});

//todo uncommment
Route::get('/', function () {

return 'done';
});
Route::get('user/active/email/{token}', [UserrController::class,'activation'],)->name('activation.account');
//region all route

//region all route

Route::group(['prefix' => 'admin', 'middleware' => ['auth:web']], function () {


    Route::get('/', [PanelController::class, 'index']);


    Route::get('panel', [PanelController::class, 'index']);

    Route::post('/panel/upload-image', [PanelController::class, 'uploadImageSubject']);

    Route::resource('articles', ArticleController::class);

    //shop
    Route::resource('courses', CourseController::class);
    Route::resource('radio', RadioController::class);
    Route::resource('books', BookController::class);
    Route::resource('podcast', PodcastController::class);

    // Comment Section
    Route::get('comments/unsuccessful', [CommentController::class, 'unsuccessful']);
    Route::resource('comments', CommentController::class);

    // Payment Section
    Route::get('payments/unsuccessful', [PaymentController::class, 'unsuccessful']);
    Route::resource('payments', PaymentController::class);

    Route::resource('episodes', EpisodeController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    //region user

    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'index']);
        Route::resource('level', LevelManageController::class, ['parameters' => ['level' => 'user']]);
        Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    });

    //endregion user

    //region category


    Route::resource('categories', ArticleCategoryController::class);

    //endregion category

    //region home page

    Route::resource('instagram', InstagramController::class);
    Route::resource('companyinfo', CompanyInfoController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('homedescription', HomeDescriptionsController::class);
    Route::resource('ourresource', OurresourceController::class);
    Route::resource('office', OfficeController::class);
    Route::resource('colleague', CommentColleaguesController::class);
    Route::resource('holding', HoldingController::class);
    Route::resource('companysarafraz', CompanySarafrazController::class);
    Route::resource('dep', DepController::class);
    Route::resource('recruitment', RecruitmentController::class);
    Route::get('recruitment1', [RecruitmentController::class, 'accept'])->name('accept');
    Route::resource('ide', \App\Http\Controllers\v1\Front\Ide\IdeController::class);
    Route::resource('setting', SettingController::class);

    Route::get('questionanswer', [QuestionanswerController::class , 'index'])->name('questionanswer.index');
    Route::get('questionanswer/create', [QuestionanswerController::class , 'create'])->name('questionanswer.create');
    Route::post('questionanswer/store', [QuestionanswerController::class , 'store'])->name('questionanswer.store');
    Route::get('questionanswer/edit/{id}', [QuestionanswerController::class , 'edit'])->name('questionanswer.edit');
    Route::put('questionanswer/update/{id}', [QuestionanswerController::class , 'update'])->name('questionanswer.update');
    Route::delete('questionanswer/destroy', [QuestionanswerController::class , 'destroy'])->name('questionanswer.destroy');


    //endregion home page

});

Route::get('home', [HomeController::class, 'index'])->name('home');
//Route::resource('test', \App\Http\Controllers\v1\Front\Ide\IdeController::class);

Route::get('/course/payment', [\App\Http\Controllers\v1\Front\Shop\CourseController::class,'payment']);
Route::get('/course/payment/checker', [\App\Http\Controllers\v1\Front\Shop\CourseController::class,'checker']);

//endregion all route
