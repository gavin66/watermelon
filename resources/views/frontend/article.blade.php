<!DOCTYPE html>
<html lang="zh-CN" class="theme-default">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--移动设备优先,为了确保适当的绘制和触屏缩放，需要在 <head> 之中添加 viewport 元数据标签。-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="博客,个人博客,Gavin的博客">
    <meta name="description" content="这是Gavin的个人博客">
    <!-- Laravel token 存放在 meta 标签中, 然后使用 jQuery 将它加入到所有的请求头中-->
    <meta name="csrf-token" content="{{ csrf_token()}}" />
    <!-- 在移动设备浏览器上，通过为视口（viewport）设置 meta 属性为 user-scalable=no 可以禁用其缩放（zooming）功能。
        这样禁用缩放功能后，用户只能滚动屏幕，就能让你的网站看上去更像原生应用的感觉。注意，这种方式不推荐所有网站使用，需看情况而定-->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->

    <title>@yield('title','Gavin\' Blog')</title>

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-3.3.5/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome-4.5.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/APlayer-master/dist/APlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/app.css') }}" >

</head>
<body style="position: relative;">

    <!-- 导航栏 -->
    <header class="navbar navbar-white navbar-static-top" id="top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse" id="bs-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}">首页</a></li>
                    <li><a href="{{ url('/category') }}">分类</a></li>
                    <li><a href="{{ url('/archive') }}">归档</a></li>
                    <li><a href="{{ url('/about') }}">关于我</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- 巨幕 -->
    <div class="jumbotron jumbotron-DarkBlue">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h1 class="font-serif">{{ $article['title'] }}</h1>
                    <p><span class="invisible">空格</span>{{ $article['outline'] }}</p>
                    <div class="wm-category inline-block">
                        <a href="" class="tag-piece tag-piece-LightPink">程序</a>
                        <a href="" class="tag-piece tag-piece-sauce">生活</a>
                        <a href="" class="tag-piece tag-piece-swarthy">人生</a>
                    </div>
                    <div class="wm-tag inline-block">
                        <a href="" class="tag-piece tag-piece-conifer">Javascript</a>
                        <a href="" class="tag-piece tag-piece-RedGold">HTML</a>
                        <a href="" class="tag-piece tag-piece-ultramarine">Node</a>
                        <a href="" class="tag-piece tag-piece-ink">Node</a>
                        <a href="" class="tag-piece tag-piece-amber">Node</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 文章详细 -->
    <section class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <!-- editor.md预览 start-->
                <div class="box-shadow" id="markdown-view">
                    <textarea title="临时" style="display:none;" id="markdown-text">{{ $article['content_md'] }}</textarea>
                </div>
                <!-- editor.md end-->

                <!-- 多说分享 start -->
                <div class="ds-share-custom box-shadow">
                    <div class="share-to-c">
                        {{--<span class="line"></span>--}}
                        <span class="text font-serif">分享到</span>
                    </div>
                    <div class="ds-share share-button-c" data-thread-key="此处请替换为当前文章的thread-key" data-title="此处请替换为分享时显示的标题" data-images="此处请替换为分享时显示的图片的链接地址" data-content="此处请替换为分享时显示的内容" data-url="此处请替换为分享时显示的链接地址">
                        <a class="fa fa-weibo share-icon share-icon-weibo" title="新浪微博" data-service="weibo"></a>
                        <a class="fa fa-tencent-weibo share-icon share-icon-tweibo" title="腾讯微博" data-service="qqt"></a>
                        <a class="fa fa-weixin share-icon share-icon-weixin" title="微信" data-service="wechat"></a>
                        <a class="fa fa-qq share-icon share-icon-qq" title="QQ" data-service="qq"></a>
                        <a class="fa fa-renren share-icon share-icon-renren" title="人人" data-service="renren"></a>

                        <a class="iconfont icon-douban share-icon share-icon-douban" title="豆瓣"  data-service="douban"></a>
                        <a class="iconfont icon-baidu share-icon share-icon-baidu" title="百度" data-service="baidu"></a>
                        <a class="iconfont icon-youdao share-icon share-icon-youdao" title="有道云笔记"  data-service="youdao"></a>

                        <a class="fa fa-google-plus share-icon share-icon-google-plus" title="Google+" data-service="google"></a>
                        <a class="fa fa-facebook share-icon share-icon-facebook" title="Facebook" data-service="facebook"></a>
                        <a class="fa fa-twitter share-icon share-icon-twitter" title="Twitter" data-service="twitter"></a>
                        <a class="fa fa-linkedin share-icon share-icon-linkedin" title="LinkedIn" data-service="linkedin"></a>
                    </div>
                </div>

                <!-- 多说分享 end -->

                <!-- 多说评论框 start -->
                <div class="ds-thread box-shadow" data-thread-key="{{ $article['id'] }}" data-title="{{ $article['title'] }}" data-url="/article/{{ $article['id'] }}"></div>
                <!-- 多说评论框 end -->

            </div>
            <div class="col-md-4 hidden-xs hidden-sm">
                <div class="music-player box-shadow" style="margin-top: 25px;">
                    <div id="aPlayer" class="aplayer"></div>
                </div>
                <div class="sidebar-chunk article-hot box-shadow">
                    <p class="sc-label inline-block">最热文章</p>
                    <ul class="list-unstyled font-serif">
                        @foreach($hotArticles as $row)
                            <li><a href="/article/{{ $row['thread_key'] }}">{{ $row['title'] }}</a>
                                <span class="comment">&nbsp;&nbsp;-&nbsp;&nbsp;{{ $row['comments'] }} 评论</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="box-shadow" id="markdown-toc">#custom-toc-container</div>
            </div>
        </div>
    </section>

    <!-- 版权等信息 -->
    <footer class="container text-center">
        <div class="row">
            <div class="col-xs-12">
                <ul class="app-footer list-inline small">
                    <li>Copyright© 2014 - 2016 </li>
                    <li class="padding-null">·</li>
                    <li>Gavin's Blog</li>
                    <li class="padding-null">·</li>
                    <li>Designed by <a itemprop="copyrightHolder" href="http://www.isgavin.me">Gavin</a></li>
                    <li class="padding-null">·</li>
                    <li><a href="http://www.miibeian.gov.cn/" target="_blank">津 ICP 备 15004268 号</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- 返回顶端 -->
    <div class="back-to-top" style="display: none;">
        <span class="fa fa-chevron-up"></span>
    </div>

    <canvas id="evanyou" width="2880" height="756"></canvas>

    <!-- 加载JS -->
    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
    <script src="{{ asset('/vendor/seajs-3.0.0/dist/sea.js') }}"></script>
    <script src="{{ asset('/script/config/seajs-config.js') }}"></script>

    <script src="{{ asset('/script/app.js') }}" ></script>
    <script src="{{ asset('/script/frontend/article.js') }}" ></script>

</body>
</html>