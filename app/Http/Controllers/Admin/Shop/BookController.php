<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\BookRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends AdminController
{
//todo edit blade book radio podcast and 2 languge in the samtime upload in update2
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $books = Course::where('kind', 'book')->latest()->paginate(20);
        return view('Admin.book.all', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        try {
            $imagesUrl = $this->uploadImages($request->file('images'));

            $course = new Course();

            $course->user_id = auth()->user()->id;
            $course->slug = $request->slug;
            $course->images = $imagesUrl;
            //book and redio and article
            $course->kind = 'book';
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
            return redirect(route('books.index'));
        }catch (\Exception $exception){

            Log::error($exception);
        }
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
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $book)
    {
        $books = Course::where('kind', 'book');
        return view('Admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $book)
    {

        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $book->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }



        unset($inputs['imagesThumb']);
        $book->update($inputs);
        return redirect(route('books.index'));
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
        return redirect(route('books.index'));
    }

}
