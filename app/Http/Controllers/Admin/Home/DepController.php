<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepRequest;
use App\Models\Homepage\WorksSection;
use Illuminate\Http\Request;

class DepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep = WorksSection::where('parent_id', '!=' , null)->where('dep',  1)->get();;
        return view('Admin.dep.all', compact('dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $worksectionfa = WorksSection::where('parent_id', '!=', null)->
        where('dep', null)->where('lang', 'fa')->where('lang', 'fa')->get();
        $worksectionen = WorksSection::where('parent_id', '!=', null)->
        where('dep', null)->where('lang', 'en')->where('lang', 'en')->get();

        return view('Admin.dep.create', compact('worksectionfa', 'worksectionen'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepRequest $request)
    {
        //
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
    public function edit(Request $request, $id)
    {
        $dep = WorksSection::where('id', $id)->first();
        return view('Admin.dep.create', compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepRequest $request, $id)
    {

        if ($request->lang == 'fa') {
            $parent_id = $request->parentfa;
        } elseif ($request->lang == 'en') {
            $parent_id = $request->parenten;
        } else {
            return back();
        }


        $imagesUrl = $this->uploadImages($request->file('images'));

        $holding = new WorksSection();
        $holding->parent_id = $parent_id;
        $holding->title = $request->title;
        $holding->description = $request->description;
        $holding->summary = $request->summary;

        //todo dep
        $holding->subheadings = $request->subheadings;
        $holding->lang = $request->lang;
        $holding->meta_desc = $request->meta_desc;
        $holding->meta_title = $request->meta_title;
        $holding->meta_keywords = $request->meta_keywords;
        $holding->images = $imagesUrl;
        $holding->save();

        return redirect(route('holding.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($worksSection )
    {
        $worksSection= WorksSection::Find($worksSection)->firstOrFail();
        $worksSection->delete();
        return redirect(route('dep.index'));
    }
}
