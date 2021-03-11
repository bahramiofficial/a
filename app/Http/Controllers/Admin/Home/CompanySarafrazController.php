<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanysarafrazRequest;
use App\Models\Homepage\WorksSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanySarafrazController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = WorksSection::where('parent_id', '!=', null)->where('dep', 0)->get();
        return view('Admin.companysarafraz.all', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $worksectionfa = WorksSection::where('parent_id', null)->
        where('dep', 0)->where('lang', 'fa')->where('lang', 'fa')->get();
        $worksectionen = WorksSection::where('parent_id', null)->
        where('dep', 0)->where('lang', 'en')->where('lang', 'en')->get();

        return view('Admin.companysarafraz.create', compact('worksectionfa', 'worksectionen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->lang == 'fa') {
            $parent_id = intval($request->parentfa);
            if (!$parent_id) {
                return back();
            }

        } elseif ($request->lang == 'en') {
            $parent_id = intval($request->parenten);
            if (!$parent_id) {
                return back();
            }
        } else {
            return back();
        }


        try {
            $imagesUrl = $this->uploadImages($request->images);

            $x = array([
                'parent_id' => $parent_id,
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'subheadings' => $request->subheadings,
                'lang' => $request->lang,
                'dep' => 0,
                'meta_desc' => $request->meta_desc,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'images' => 'f'
            ]);

            $u = WorksSection::create($x[0]);

            dd($u);
            //todo error

            $holding = new WorksSection();

            $holding->parent_id = $parent_id;
            $holding->title = $request->title;
            $holding->description = $request->description;
            $holding->summary = $request->summary;
            $holding->subheadings = $request->subheadings;
            $holding->lang = $request->lang;
            $holding->dep = 0;
            $holding->meta_desc = $request->meta_desc;
            $holding->meta_title = $request->meta_title;
            $holding->meta_keywords = $request->meta_keywords;
            $holding->images = $holding->images['thumb'];

            dd('ddd');

            if ($holding->save()) {
                dd('ddd');
            }

            dd('ddd');

            return redirect(route('companysarafraz.index'));

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
        $company = WorksSection::where('id', $id)->first();
        return view('Admin.companysarafraz.create', compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanysarafrazRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($worksSection)
    {
        $worksSection = WorksSection::Find($worksSection)->firstOrFail();
        $worksSection->delete();
        return redirect(route('companysarafraz.index'));
    }
}
