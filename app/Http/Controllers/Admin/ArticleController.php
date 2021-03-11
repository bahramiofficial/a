<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//todo search
class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('articlecategory')->latest()->paginate(20);
        return view('Admin.articles.all', compact('articles'));
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
            ->paginate(10);

        return view('Admin.articles.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try {
            $imagesUrl = $this->uploadImages($request->file('images'));
            $article = new Article();

            $article->user_id = auth()->user()->id;
            $article->articlecategory_id = $request->category_id;
            $article->title = $request->title;
            $article->slug = $request->slug;
            $article->description = $request->description;
            $article->body = $request->body;
            $article->images = $imagesUrl;
            $article->tags = $request->tags;
            $article->lang = $request->lang;
            $article->save();
            return redirect(route('articles.index'));

        } catch (\Exception $exception) {
            Log::error($exception);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {

        $categories = ArticleCategory::with('childrenRecursive')
            ->where('parent_id', null)
            ->paginate(10);

        $articleC = Article::Find($article)->with('articlecategory')->get()[0];
        $article = Article::Find($article)->first();
//       'Admin.articles.create', compact(['categories']));


        return view('Admin.articles.edit', compact(['articleC','article', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
        } else {
            $inputs['images'] = $article->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $article->update($inputs);


        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}
