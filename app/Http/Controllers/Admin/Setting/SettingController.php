<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Homepage\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting= Setting::all();
        return view('Admin.setting.all',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {//todo dont saave
        try {

            $imagesUrl1 = $this->uploadImages($request->file('images'));
            $setting =new Setting();
            $setting->educationalpack=$request->educationalpack;
            $setting->educationalarticles=$request->educationalarticles;
            $setting->ebook=$request->ebook;
            $setting->podcast=$request->podcast;
            $setting->newsarticles=$request->newsarticles;
            $setting->khabarname=$request->khabarname;
            $setting->img=$request->img;
            $setting->cooperation=$request->cooperation;
            $setting->voicebook=$request->voicebook;
            $setting->latest=$request->latest;
            $setting->usualquestions=$request->usualquestions;
            $setting->acceptidea=$request->acceptidea;
            $setting->logo=$imagesUrl1;
            $setting->title=$request->title;
            $setting->homedesctop=$request->homedesctop;
            $setting->worksection=$request->worksection;
            $setting->dep=$request->dep;
            $setting->article=$request->article;
            $setting->homedescdown=$request->homedescdown;
            $setting->ourresources=$request->ourresources;
            $setting->instagram=$request->instagram;
            $setting->coleagesuggecstions=$request->coleagesuggecstions;
            $setting->contactus=$request->contactus;
            $setting->lang = $request->lang;
            $setting->save();

            return redirect(route('setting.index'));
        }catch (\Exception $exception){
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
        $setting = Setting::where('id', $id)->first();
        return view('Admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $setting->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $setting->update($inputs);
        return redirect(route('setting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect(route('setting.index'));

    }
}
