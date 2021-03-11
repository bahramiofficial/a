<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('kind','package')->latest()->paginate(20);
        return view('Admin.courses.all' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));


        $course = new Course();
        $course->user_id = auth()->user()->id;
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->description = $request->description;
        $course->body = $request->body;
        $course->images = $imagesUrl;
        $course->tags = $request->tags;
        $course->price = $request->price;
        $course->type = $request->type;
        $course->lang= $request->lang;
        $course->save();


        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('Admin.courses.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $course->update($inputs);

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('courses.index'));
    }
}
