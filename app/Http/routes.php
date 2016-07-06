<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::auth();
//$this->get('login', 'Auth\AuthController@showLoginForm');
//$this->post('login', 'Auth\AuthController@login');
//$this->get('logout', 'Auth\AuthController@logout');
//
//// Registration Routes...
//$this->get('register', 'Auth\AuthController@showRegistrationForm');
//$this->post('register', 'Auth\AuthController@register');
//
//// Password Reset Routes...
//$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//$this->post('password/reset', 'Auth\PasswordController@reset');

//Route::get('/home', 'HomeController@index');


// 测试使用
//Route::resource('category', 'Backend\CategoryController');
//Route::get('phpinfo', function () {
//    phpinfo();
//});
Route::get('mainTest', function () {
//    $searcher = \App\Model\Article::whereRaw('1=1')->orderBy('created_at', 'desc');
//
//    $archive = [];
//
//    $searcher->chunk(5,function($articles) use (&$archive){
//        foreach($articles as $article){
//            if( !isset( $archive[$article->created_at->format('Y-m')] ) ){
//                $archive[$article->created_at->format('Y-m')] = [];
//            }
//            $archive[$article->created_at->format('Y-m')][] = $article;
//        }
//
//    });
//
//    dd($archive);

    dd(DuoShuo::getCommentsCountByArticleId(2));


});
//Route::get('httpTest', function () {
//    $client = new \GuzzleHttp\Client([
//        'base_uri' => 'http://httpbin.org',
//        'timeout' => 2.0,
//    ]);
//    $response = $client->request('GET', 'get', ['query' => ['foo' => 'bar'],'body'=>'Gavin']);
//
//    echo $response->getBody();
//
//});
//
//Route::get('duoshuo', function () {
//    $duoshuo = new \App\Services\DuoShuo();
//    echo $duoshuo->getHotArticles();
//});
//
//
//Route::get('redisTest', function () {
//
//    $v = RedisManager::command('hset', [ 'watermelon_tag_class', '特斯拉', 'tag-piece-LightPink' ]);
//
////    $v = RedisManager::command('get',['watermelon_thumbs_up_count']);
//
//
//    $v = RedisManager::command('hget', [ 'watermelon_tag_class', '特斯拉' ]);
//
//    if ( is_null($v) ) {
//        $v = 'kong';
//    }
//
//    return $v;
//});
//Route::get('orm', function () {
//    $data = \App\Model\Article::skip(0)->take(10)->get();
//
//    dd($data);
//});
//
//Route::get('table-edit', function () {
//    Schema::table('articles', function ($table) {
//        $table->string('outline');
//    });
//});

// 坑爹啊  session
//Route::get('captcha/{config?}', '\Mews\Captcha\CaptchaController@getCaptcha')->middleware(['web']);

//Route::group(['middleware' => ['web']], function () {
//    Route::any('captcha-test', function(){
//        if (Request::getMethod() == 'POST')
//        {
//            $rules = ['captcha' => 'required|captcha'];
//            $validator = Validator::make(Request::all(), $rules);
////        captcha_check('');
//            if ($validator->fails())
//            {
//                echo '<p style="color: #ff0000;">Incorrect!'.Request::input('captcha').'</p>';
//            }
//            else
//            {
//                echo '<p style="color: #00ff30;">Matched :)</p>';
//            }
//
//            foreach($validator->errors() as $error){
//                echo $error.'|!!!';
//            }
//        }
//
//
//
//        $form = '<form method="post" action="captcha-test">';
//        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
//        $form .= '<p>' . captcha_img() . '</p>';
//        $form .= '<p><input type="text" name="captcha"></p>';
//        $form .= '<p><button type="submit" name="check">Check</button></p>';
//        $form .= '</form>';
//        return $form;
//    });
//});


/**
 * 前台部分
 */
Route::group([ 'namespace' => 'Frontend' ], function () {

    // 前台主页 文章列表
    Route::get('/', 'FrontendController@index');

    // 文章详细页
    Route::get('article/{id}', 'FrontendController@article');

    // 分类
    Route::get('category', 'FrontendController@category');

    // 归档
    Route::get('archive', 'FrontendController@archive');

    // 关于我
    Route::get('about', 'FrontendController@about');

    // 点赞
    Route::get('thumbsUp', 'FrontendController@thumbsUp');

});


/**
 * 认证与注册部分
 */
Route::group([ 'namespace' => 'Auth' ], function () {
    // 显示认证页
    Route::get('login', 'AuthController@showLoginForm');
    Route::get('admin', 'AuthController@showAdminLoginForm');

    Route::group([ 'prefix' => 'auth' ], function () {
        // 登录
        Route::post('login', 'AuthController@login');

        // 登出
        Route::get('logout', 'AuthController@logout');

        // 注册
        Route::post('register', 'AuthController@register');
    });

    Route::group([ 'prefix' => 'password' ], function () {
        // 发送密码重置链接路由
        Route::get('email', 'PasswordController@getEmail');
        Route::post('email', 'PasswordController@postEmail');

        // 密码重置路由
        Route::get('reset/{token}', 'PasswordController@getReset');
        Route::post('reset', 'PasswordController@postReset');
    });
});


/**
 * 后台部分
 */
//\Redis::set('test',$this->redirectPath());

Route::group([ 'namespace' => 'Backend', 'middleware' => [ 'auth', 'web' ] ], function () {
    Route::group([ 'prefix' => 'backend' ], function () {

        // 后台主页
        Route::get('/', 'BackendController@index');

        /**
         * 需要添加一个中间件, pjax访问还是其他
         */
        //文章
        Route::resource('article', 'ArticleController');
        Route::resource('category', 'CategoryController');
        Route::resource('tag', 'TagController');

    });
});


