<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Response;


class SitemapController extends Controller
{
    public function index()
    {
        try {

            $sitemap = app()->make('sitemap');
            $sitemap->setCache('laravel.sitemap', 60);

            if(! $sitemap->isCached() ) {
                $sitemap->addSitemap(url()->to('/sitemap-articles'));
            }
            $data = ['data0' => ['status' => 1,
                'sitemap'=>$sitemap->render('sitemapindex') ]];

            return response()->json($data,Response::HTTP_OK);

        }catch(\Exception $exception){

            return response()->json(null,Response::HTTP_BAD_REQUEST);

        }
    }

    public function articles()
    {
        try {
            $sitemap = app()->make('sitemap');
            $sitemap->setCache('laravel.sitemap.articles', 60);

            if(! $sitemap->isCached() ) {
                $articles = Article::latest()->get();
                foreach ($articles as $article) {
                    $sitemap->add(url()->to($article->path()),$article->created_at ,'0.9','Weekly');
                }
            }
            $data = ['data0' => ['status' => 1,
                'sitemap'=>$sitemap->render() ]];

            return response()->json($data,Response::HTTP_OK);

        }catch (\Exception $exception){

            return response()->json($data,Response::HTTP_BAD_REQUEST);
        }

    }
}
