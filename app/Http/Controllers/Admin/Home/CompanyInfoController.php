<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoRequest;
use App\Models\Homepage\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyinfo = CompanyInfo::all();
        return view('Admin.companyinfo.all', compact('companyinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.companyinfo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyInfoRequest $request)
    {
        try {

            $companyinfo = new CompanyInfo();
            $companyinfo->humanresourse = $request->humanresourse;
            $companyinfo->year = $request->year;
            $companyinfo->customercompetition = $request->customercompetition;
            $companyinfo->ongoingproject = $request->ongoingproject;
            $companyinfo->projectdone = $request->projectdone;
            $companyinfo->lang = $request->lang;
            $companyinfo->save();
            return redirect(route('companyinfo.index'));
        }catch (Exception $exception){
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
        $companyinfo = CompanyInfo::where('id',$id)->first();
        return view('Admin.companyinfo.edit',
            compact('companyinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyInfoRequest $request, $id)
    {
        try {
            $companyinfo = CompanyInfo::where('id',$id)->first();
            $companyinfo->humanresourse = $request->humanresourse;
            $companyinfo->year = $request->year;
            $companyinfo->customercompetition = $request->customercompetition;
            $companyinfo->ongoingproject = $request->ongoingproject;
            $companyinfo->projectdone = $request->projectdone;
            $companyinfo->lang = $request->lang;
            $companyinfo->save();
            return redirect(route('companyinfo.index'));
        }catch (Exception $exception){
            Log::error($exception);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $companyInfo)
    {
        $companyInfo = CompanyInfo::Find($companyInfo)->firstOrFail();
        $companyInfo->delete();
        return redirect(route('companyinfo.index'));

    }
}
