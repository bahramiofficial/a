<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeDescriptionsRequest;
use App\Models\Homepage\HomeDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeDescriptionsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $description = HomeDescription::all();
        return view('Admin.homedescription.all', compact('description'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.homedescription.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeDescriptionsRequest $request)
    {
        try {
            $imagesUrl1 = $this->uploadImages($request->file('images1'));
            $imagesUrl2 = $this->uploadImages($request->file('images2'));
            $imagesUrl3 = $this->uploadImages($request->file('images3'));
            $description = new HomeDescription();
            $description->title = $request->title;
            $description->description = $request->description;
            $description->summary = $request->summary;
            $description->link = $request->link;
            $description->images1 = $imagesUrl1;
            $description->images2 = $imagesUrl2;
            $description->images3 = $imagesUrl3;
             $description->lang = $request->lang;
            $description->meta_desc = $request->meta_desc;
            $description->meta_title = $request->meta_title;
            $description->meta_keywords = $request->meta_keywords;
            $description->save();


            return redirect(route('homedescription.index'));
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
        $description = HomeDescription::where('id', $id)->first();
        return view('Admin.homedescription.edit', compact('description'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeDescriptionsRequest $request, HomeDescription $description)
    {
        try {
//todo dont update

            $file1 = $request->file('images1');
            $file2 = $request->file('images2');
            $file3 = $request->file('images3');

            $inputs = $request->all();

            if ($file1 && $file2 && $file3) {
                $inputs['images1'] = $this->uploadImages($request->file('images1'));
                $inputs['images2'] = $this->uploadImages($request->file('images2'));
                $inputs['images3'] = $this->uploadImages($request->file('images3'));
            } else {
                $inputs['images1'] = $description->images1;
                $inputs['images1']['thumb'] = $inputs['imagesThumb1'];
                $inputs['images2'] = $description->images2;
                $inputs['images2']['thumb'] = $inputs['imagesThumb2'];
                $inputs['images3'] = $description->images3;
                $inputs['images3']['thumb'] = $inputs['imagesThumb3'];

            }

            unset($inputs['imagesThumb1']);
            unset($inputs['imagesThumb2']);
            unset($inputs['imagesThumb3']);
            $description->update($inputs);

            return redirect(route('homedescription.index'));
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($homeDescription)
    {
        $homeDescription = HomeDescription::Find($homeDescription)->first();
        $homeDescription->delete();
        return redirect(route('homedescription.index'));

    }
}
