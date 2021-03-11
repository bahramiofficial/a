<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Resources\Api\V1\Shop\CourseCollection;
use App\Models\Course;
use App\Models\Learning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    public function __construct()
    {
        auth()->loginUsingId(1);
    }

    public function index()
    {
        //$this->authorize('show-users');
        $users = auth()->user();
        $course = Learning::select('course_id')->where('user_id', $users->id)->get();
        $count = Course::Find($course)->count();
        $profile = array(
            [
                'id' => $users->id,
                'name' => $users->name,
                'images' => $users->images,
                'count' => $count,
            ]
        );


        return response()->json($profile, 200);
    }

    public function allCourse()
    {
        $course = Learning::select('course_id')->
        where('user_id', auth()->user()->id)->get();
        $allCourse = Course::Find($course)->get();

        return new CourseCollection($allCourse);
    }


    public function chengePassword(Request $request)
    {


        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required',
            'new_password' => 'confirmed|max:8|different:password',
        ]);

        if (Hash::check($request->oldpassword, auth()->user()->password)) {
            $user = auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);
            if ($user)
                return response()->json(null, 200);
            else
                return response()->json(null, 400);

        }
        return response()->json(null, 400);

    }


    public function uplodImage(Request $request)
    {
        //todo validtor
        //  todo all route
        $imagesUrl = $this->uploadImages($request->file('images'));
        $user = auth()->user()->update([
            'images' => $imagesUrl,
        ]);

        if ($user)

            return response()->json(null, 200);
        else
            return response()->json(null, 400);
    }


}
