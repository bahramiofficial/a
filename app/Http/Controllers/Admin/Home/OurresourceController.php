<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\OurResourceRequest;
use App\Models\Homepage\OurResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OurresourceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ourresource = OurResource::all();
        return view('Admin.ourresource.all', compact('ourresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.ourresource.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurResourceRequest  $request)
    {
            $imagesUrl = $this->uploadImages($request->file('images'));
            $ourresource = new  OurResource();
            $ourresource->company = $request->company;
            $ourresource->link = $request->link;
            $ourresource->images = $imagesUrl;
        $ourresource->lang = $request->lang;

        $ourresource->save();

            return redirect(route('ourresource.index'));

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
        $ourresource = OurResource::where('id',$id)->first();
        return view('Admin.ourresource.edit' ,compact('ourresource'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OurResourceRequest $request,OurResource $ourResource)
    {
        try {
            $file = $request->file('images');
            $inputs = $request->all();

            if($file) {
                $inputs['images'] = $this->uploadImages($request->file('images'));
            } else {
                $inputs['images'] = $ourResource->images;
                $inputs['images']['thumb'] = $inputs['imagesThumb'];

            }

            unset($inputs['imagesThumb']);
            $ourResource->update();

            return redirect(route('ourresource.index'));
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ourResource)
    {
        $ourResource= OurResource::Find($ourResource)->firstOrFail();
        $ourResource->delete();
        return redirect(route('ourresource.index'));

    }
}
