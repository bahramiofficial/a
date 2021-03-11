<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\RadioRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RadioController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radio = Course::where('kind', 'radio')->latest()->paginate(20);
        return view('Admin.radio.all', compact('radio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.radio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadioRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));
        $course = new Course();

        $course->user_id = auth()->user()->id;
        $course->slug = $request->slug;
        $course->images = $imagesUrl;
        $course->price = $request->price;
        //book and redio and article
        $course->kind = 'radio';
        $course->title = $request->title;
        $course->body = $request->body;
        $course->type = $request->type;
        $course->tags = $request->tags;
        $course->price = $request->price;
        $course->slugvoice = $request->slugvoice;
        $course->writer = $request->writer;
        $course->summery = $request->summery;
        $course->speaker = $request->speaker;
        $course->review = $request->review;
        $course->voice = $request->voice;
        $course->dpdfCount = $request->dpdfCount;
        $course->linkb = $request->linkb;
        $course->meta_desc = $request->meta_desc;
        $course->meta_title = $request->meta_title;
        $course->meta_keywords = $request->meta_keywords;
        $course->lang = $request->lang;


        $course->save();

        return redirect(route('radio.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $radio
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $radio)
    {
        return view('Admin.radio.edit', compact('radio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(RadioRequest $request, Course $course)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $course->update($inputs);

        return redirect(route('radio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        $course =Course::Find($course);
        $course->delete();
        return redirect(route('radio.index'));
    }

}
