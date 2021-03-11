<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\QuestionanswerRequest;
use App\Models\Course;
use App\Models\Questionanswer;
use Illuminate\Support\Facades\Log;

class QuestionanswerController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionanswer=Questionanswer::all();
        return view('Admin.questionanswer.all' ,compact('questionanswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::all();
        return view('Admin.questionanswer.create' ,compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionanswerRequest $request)
    {
        try{
            $questionanswer = new Questionanswer();
            $questionanswer->course_id = $request->course_id;

            $questionanswer->why = $request->why;
            $questionanswer->benefit = $request->benefit;
            $questionanswer->hours = $request->hours;
            $questionanswer->lessonG = $request->lessonG;
            $questionanswer->lessonInfo = $request->lessonInfo;

            $questionanswer->cwhy = $request->cwhy;
            $questionanswer->cbenefit = $request->cbenefit;
            $questionanswer->chours = $request->chours;
            $questionanswer->clessonG = $request->clessonG;
            $questionanswer->clessonInfo = $request->clessonInfo;

            $questionanswer->lang = $request->lang;

            $questionanswer->meta_desc = $request->meta_desc;
            $questionanswer->meta_title = $request->meta_title;
            $questionanswer->meta_keywords = $request->meta_keywords;

            $questionanswer->save();
            return redirect(route('questionanswer.index'));
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


    public function edit($id)
    {
        $courseen=Course::where('lang', 'en')->get();
        $coursefa=Course::where('lang', 'fa')->get();
        $questionanswer = Questionanswer::where('id', $id)->first();
        return view('Admin.questionanswer.edit' ,compact('questionanswer','courseen','coursefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionanswerRequest $request, $id)
    {
        dd($request->all());

        try{
            $questionanswer = Questionanswer::find($id);
            $questionanswer->course_id = $request->course_id;

            $questionanswer->why = $request->why;
            $questionanswer->benefit = $request->benefit;
            $questionanswer->hours = $request->hours;
            $questionanswer->lessonG = $request->lessonG;
            $questionanswer->lessonInfo = $request->lessonInfo;

            $questionanswer->cwhy = $request->cwhy;
            $questionanswer->cbenefit = $request->cbenefit;
            $questionanswer->clessonG = $request->clessonG;
            $questionanswer->chours = $request->chours;
            $questionanswer->clessonInfo = $request->clessonInfo;

            $questionanswer->lang = $request->lang;
            $questionanswer->meta_desc = $request->meta_desc;
            $questionanswer->meta_title = $request->meta_title;
            $questionanswer->meta_keywords = $request->meta_keywords;
            $questionanswer->save();
            return redirect(route('questionanswer.index'));
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
    public function destroy(Questionanswer $questionanswer)
    {
        $questionanswer->delete();
        return redirect(route('questionanswer.index'));
    }
}
