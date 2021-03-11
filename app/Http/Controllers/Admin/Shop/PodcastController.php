<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\PodcastRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PodcastController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $podcasts = Course::where('kind', 'podcast')->latest()->paginate(20);
        return view('Admin.podcast.all', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.podcast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {


        $imagesUrl = $this->uploadImages($request->file('images'));
        $course = new Course();

        $course->user_id = auth()->user()->id;
        $course->slug = $request->slug;
        $course->images = $imagesUrl;
        //book and redio and article
        $course->kind = 'podcast';
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


        return redirect(route('podcast.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $podcast)
    {
        return view('Admin.podcast.edit', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(PodcastRequest $request, Course $podcast)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $podcast->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $podcast->update($inputs);
        return redirect(route('podcast.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $podcast)
    {
        $podcast->delete();
        return redirect(route('podcast.index'));
    }
}
