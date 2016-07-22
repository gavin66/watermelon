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

/**
 * 前台部分
 */
Route::group([ 'namespace' => 'Frontend' ], function () {

    // 前台主页 文章列表
    Route::get('/', [ 'as' => 'articles_list','uses' => 'FrontendController@index' ]);

    // 文章详细页
    Route::get('article/{id}', [ 'as' => 'article','uses'=>'FrontendController@article' ]);

    // 分类
    Route::get('category', 'FrontendController@category');

    // 归档
    Route::get('archive', 'FrontendController@archive');

    // 关于我
    Route::get('about', 'FrontendController@about');

});

/**
 * api
 */
Route::group([ 'prefix' => 'api' ], function () {

    // 点赞
    Route::get('thumbsUp', 'APIController@thumbsUp');

    // 获取标签
    Route::get('getTags.json', 'APIController@getTags');

    // 获取分类
    Route::get('getCategories.json', 'APIController@getCategories');

    // 获取文件
    Route::get('getFiles.json','APIController@getFiles');

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
        // 分类
        Route::resource('category', 'CategoryController');
        // 标签
        Route::resource('tag', 'TagController');
        // 多媒体
        Route::resource('media', 'MediaController');

    });
});


