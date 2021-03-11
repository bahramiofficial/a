<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Resources\Api\V1\ArticleCollection;
use App\Http\Resources\Api\V1\SingleArticleCollection;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    public function categoryR()
    {

        try {
            $lang = app()->getLocale();
            $category = ArticleCategory::where('Lang', $lang)->with('children')->get();


            return response()->json($category, 200);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function articles()
    {

        try {
            $lang = app()->getLocale();
            $ar = Article::latest()->where('lang', $lang)->get();
            $arr = array();
            foreach ($ar as $arti) {
                array_push($arr, [
                    'articlecategory_id' => $arti->articlecategory_id,
                    'title' => $arti->title,
                    'slug' => $arti->slug,
                    'description' => $arti->description,
                    'body' => $arti->body,
                    'images' => $arti->images,
                    'tags' => $arti->tags,
                    'viewCount' => $arti->viewCount,
                    'commentCount' => $arti->commentCount,
                    'meta_desc' => $arti->meta_desc,
                    'meta_title' => $arti->meta_title,
                    'meta_keywords' => $arti->meta_keywords,
                ]);
            }

            return response()->json($arr, 200);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

    public function single($slug)
    {
        try {
            $item = Article::where('slug', $slug)->first();


            return response()->json([
                'articlecategory_id' => $item->articlecategory_id,
                'title' => $item->title,
                'slug' => $item->slug,
                'description' => $item->description,
                'body' => $item->body,
                'images' => $item->images,
                'tags' => $item->tags,
                'viewCount' => $item->viewCount,
                'commentCount' => $item->commentCount,
                'meta_desc' => $item->meta_desc,
                'meta_title' => $item->meta_title,
                'meta_keywords' => $item->meta_keywords,
            ], 200);

            //    return new SingleArticleCollection($x);
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, Response::HTTP_BAD_REQUEST);
        }
    }

}
