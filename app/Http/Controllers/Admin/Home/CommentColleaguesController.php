<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Homepage\CommentColleague;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentColleaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleague = CommentColleague::all();
        return view('Admin.commentcolleagues.all', compact('colleague'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.commentcolleagues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request  )
    {
        try {
            $colleague = new CommentColleague;
            $colleague->user_id=Auth::user()->id;
            $colleague->comment=$request->comment;
            $colleague->family=$request->family;
            $colleague->name=$request->name;
            $colleague->score=$request->score;
            $colleague->position=$request->position;
            $colleague->lang=$request->lang;
            $colleague->save();

            return redirect(route('colleague.index'));
        }catch (\Exception $exception){
            Log::error($exception);
            return Response::HTTP_BAD_REQUEST;
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
        $colleague = CommentColleague::where('id', $id)->first();
        return view('Admin.commentcolleagues.edit', compact('colleague'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        try {
            $colleague =CommentColleague::where('id',$id)->first();
            $colleague->user_id=Auth::user()->id;
            $colleague->comment=$request->comment;
            $colleague->family=$request->family;
            $colleague->name=$request->name;
            $colleague->score=$request->score;
            $colleague->position=$request->position;
            $colleague->lang=$request->lang;
            $colleague->save();

            return redirect(route('colleague.index'));
        }catch (\Exception $exception){
            Log::error($exception);
            return Response::HTTP_BAD_REQUEST;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentColleague $colleague)
    {
        $colleague->delete();
        return redirect(route('colleague.index'));
    }
}
