<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//todo 2lang
        $categories = ArticleCategory::with('childrenRecursive')
            ->where('parent_id', null)
            ->paginate(10);

        return view('admin.articlecategories.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategory::with('childrenRecursive')
            ->where('parent_id', null)
            ->get();

        return view('admin.articlecategories.create', compact(['categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new ArticleCategory();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('category_parent');
        $category->meta_title = $request->input('meta_title');
       // $category->lang = $request->input('lang'); todo
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();


        return redirect()->route('categories.index');
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
        $categories = ArticleCategory::with('childrenRecursive')
            ->where('parent_id', null)
            ->get();
        $category = ArticleCategory::findOrFail($id);
        return view('admin.articlecategories.edit', ['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('category_parent');
        // $category->lang = $request->input('lang'); todo
        $category->meta_title = $request->input('meta_title');
        $category->meta_desc = $request->input('meta_desc');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ArticleCategory::with('childrenRecursive')->where('id', $id)->first();
        if (count($category->childrenRecursive) > 0) {
            Session::flash('error_category', 'دسته بندی ' . $category->name . ' دارای زیر دسته است. بنابراین حذف آن امکان پذیر نمی باشد.');
            return redirect()->route('categories.index');
        }
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function indexSetting($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $attributeGroups = AttributeGroup::all();
        return view('admin.articlecategories.index-setting', compact(['category', 'attributeGroups']));
    }

    public function saveSetting(Request $request, $id)
    {

        $category = ArticleCategory::findOrFail($id);
        $category->attributeGroups()->sync($request->attributeGroups);
        $category->save();
        //to('/administrator/categories')
        return redirect()->route('categories.index');
    }

    public function apiIndex()
    {
        $categories = ArticleCategory::with('childrenRecursive')
            ->where('parent_id', null)
            ->get();

        $response = [
            'categories' => $categories
        ];
        return response()->json($response, 200);
    }

    public function apiIndexAttribute(Request $request)
    {
        $categories = $request->all();
        $attributeGroup = ArticleCategory::with('attributesValue', 'categories')
            ->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            })->get();
        $response = [
            'attributes' => $attributeGroup
        ];
        return response()->json($response, 200);
    }

}
