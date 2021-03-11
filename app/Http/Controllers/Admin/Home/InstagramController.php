<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstagramRequest;
use App\Models\Homepage\Instagram;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InstagramController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instagram = Instagram::all();
        return view('Admin.instagram.all', compact('instagram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.instagram.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstagramRequest $request)
    {


        try {
            $imagesUrl = $this->uploadImages($request->file('images'));

            $instagram = new Instagram();
            $instagram->user_id = Auth::user()->id;
            $instagram->title = $request->title;
            $instagram->link = $request->link;
            $instagram->images = $imagesUrl;
            $instagram->meta_desc = $request->meta_desc;
            $instagram->meta_title = $request->meta_title;
            $instagram->meta_keywords = $request->meta_keywords;
            $instagram->lang = $request->lang;
            $instagram->save();
            return redirect(route('instagram.index'));
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
        $instagram = Instagram::where('id', $id)->first();
        return view('Admin.instagram.edit', compact('instagram'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstagramRequest $request, Instagram $instagram)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $instagram->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $instagram->update($inputs);
        return redirect(route('instagram.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Instagram $instagram)
    {
        $instagram->delete();
        return redirect(route('instagram.index'));
    }
}
