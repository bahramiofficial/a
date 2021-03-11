<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Models\Homepage\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office=Office::all();
        return view('Admin.office.all',compact('office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.office.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeRequest $request)
    {
        try {
            $office = new Office();
            $office->country = $request->country;
            $office->address = $request->address;
            $office->Phone = $request->Phone;
            $office->email = $request->email;
            $office->lat = $request->lat;
            $office->lng = $request->lng;
            $office->meta_title = $request->meta_title;
            $office->meta_desc = $request->meta_desc;
            $office->meta_keywords = $request->meta_keywords;
            $office->lang = $request->lang;

            $office->save();
            return redirect(route('office.index'));
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
        $office=Office::where('id',$id)->first();
        return view('Admin.office.edit',compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeRequest $request, Office $office)
    {
        try {

            $office->country = $request->country;
            $office->address = $request->address;
            $office->Phone = $request->Phone;
            $office->email = $request->email;
            $office->lat = $request->lat;
            $office->lng = $request->lng;
            $office->meta_title = $request->meta_title;
            $office->meta_desc = $request->meta_desc;
            $office->meta_keywords = $request->meta_keywords;
            $office->lang = $request->lang;
            $office->save();
            return redirect(route('office.index'));
        }catch (\Exception $exception){
            Log::error($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();
        return redirect(route('office.index'));

    }
}
