<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\DuoShuo;
use Request;
use Response;
use RedisManager;
use App\Model\Article;

class FrontendController extends Controller {

    public function __construct() {

    }

    public function index() {
        $tags = Request::input('tags');
        $categories = Request::input('categories');

        $sort = Request::input('sort', 'created_at');
        $order = Request::input('order', 'desc');

        $searcher = Article::whereRaw('1=1');
        trim($tags) != '' && $searcher->whereRaw('tags like \'%"' . $tags . '"%\'');
        trim($categories) != '' && $searcher->whereRaw('categories like \'%"' . $categories . '"%\'');
        isset( $sort ) && isset( $order ) && $searcher->orderBy($sort, $order);
        $articles = $searcher->paginate(10);


        return Response::view('frontend.index', [ 'articles' => $articles ]);
    }

    public function article( $id ) {
        $article = Article::find($id);

        $hot_articles = (new DuoShuo())->getHotArticles([ ], false);


        return response()->view('frontend.article', [ 'article' => $article, 'hotArticles' => $hot_articles ]);

    }

    public function about() {

        return response()->view('frontend.about', Article::find(2));

    }

    public function category() {

        return response()->view('frontend.category', [ ]);

    }

    public function archive() {
//        $searcher = Article::whereRaw('1=1')->orderBy('created_at', 'desc');
//        $articles = $searcher->paginate(10);
//        return Response::view('frontend.archive', [ 'articles' => $articles ]);

        $searcher = \App\Model\Article::whereRaw('1=1')->orderBy('created_at', 'desc');

        $archive = [];

        $searcher->chunk(5,function($articles) use (&$archive){
            foreach($articles as $article){
                if( !isset( $archive[$article->created_at->format('Y-m')] ) ){
                    $archive[$article->created_at->format('Y-m')] = [];
                }
                $archive[$article->created_at->format('Y-m')][] = $article;
            }
        });

        return Response::view('frontend.archive', [ 'archive' => $archive ]);

    }

    public function thumbsUp() {

        $count = RedisManager::command('incr', [ 'watermelon_thumbs_up_count' ]);

        return [ 'count' => $count ];
    }

}
