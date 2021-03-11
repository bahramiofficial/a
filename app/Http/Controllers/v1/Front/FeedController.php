<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    public function articles()
    {
        try {
            $feed = app()->make('feed');

            $feed->setCache(1,'laravel.feed.article');

            if(! $feed->isCached() ) {
                $articles = Article::latest()->take(10)->get();

                foreach ($articles as $article) {
                    $feed->add($article->title,$article->user->name, url($article->path()),$article->created_at , strip_tags($article->description) , strip_tags($article->body));
                }
            }

            $data = ['data' => ['status' => 1,
                'rss' => $feed->render('rss')]];
            $feed->render('rss');

            return response()->json($data,Response::HTTP_OK);

        }catch (\Exception $exception){

            return \response()->json(null,Response::HTTP_BAD_REQUEST);
        }
    }
}
