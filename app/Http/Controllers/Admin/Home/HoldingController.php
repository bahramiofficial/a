<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\HoldingRequest;
use App\Models\Homepage\WorksSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HoldingController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holding=WorksSection::where('parent_id', null)->get();
        return view('Admin.holding.all',compact('holding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.holding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoldingRequest $request)
    {

        try {
            $imagesUrl = $this->uploadImages($request->file('images'));
//dep اینجا سیو نمیکنیم
            $holding=new WorksSection();
            $holding->title = $request->title;
            $holding->description = $request->description;
            $holding->summary = $request->summary;
            $holding->subheadings = $request->subheadings;
            $holding->lang = $request->lang;
            $holding->meta_desc = $request->meta_desc;
            $holding->meta_title = $request->meta_title;
            $holding->meta_keywords = $request->meta_keywords;
            $holding->link = $request->link;
            $holding->images =$imagesUrl ;

            $holding->save();
            return redirect(route('holding.index'));

        }catch (\Exception $exception)
        {
            Log::error($exception);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holding = WorksSection::where('id', $id)->first();
        return view('Admin.holding.edit',compact('holding'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HoldingRequest $request, WorksSection $worksSection)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $worksSection->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $worksSection->update($inputs);
        return redirect(route('holding.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $worksSection)
    {
        $worksSection= WorksSection::Find($worksSection)->firstOrFail();
        $worksSection->delete();
        return redirect(route('holding.index'));


    }
}
