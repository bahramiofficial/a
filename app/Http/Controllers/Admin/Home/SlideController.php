<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Homepage\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;

class SlideController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('Admin.slide.all', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.slide.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {

        try {
            $imagesUrl1 = $this->uploadImages($request->file('images'));
            $slide = new Slide();
            $slide->title1 = $request->title1;
            $slide->title2 = $request->title2;
            $slide->title3 = $request->title3;
            $slide->description = $request->description;
            $slide->images = $imagesUrl1;
            $slide->meta_desc = $request->meta_desc;
            $slide->meta_title = $request->meta_title;
            $slide->meta_keywords = $request->meta_keywords;
            $slide->lang = $request->lang;
            $slide->type = $request->type;
            $slide->save();
            return redirect(route('slide.index'));
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::where('id', $id)->first();
        return view('Admin.slide.edit', compact('slide'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, Slide $slide)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $slide->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $slide->update($inputs);
        return redirect(route('slide.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect(route('slide.index'));

    }
}
