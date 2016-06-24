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

    {{--<link rel="stylesheet" href="{{ asset('/plug-in/editor.md-1.5.0/css/editormd.min.css') }}" >--}}
    {{--<link rel="stylesheet" href="{{ asset('/style/frontend/duoshuo.css') }}" >--}}

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
<div class="jumbotron jumbotron-ZhuBiao">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h1 class="font-serif">Archive</h1>
            </div>
        </div>
    </div>
</div>

<!-- 关于我 详细信息 -->
<section class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <section class="timeline">
                <div class="timeline-body">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="timeline-date text-center"><h3 class="inline-block box-shadow font-serif">三月 2015</h3></div>
                        <article class="timeline-box {{ $i%2 == 0 ? 'left' : 'right'}} box-shadow ">
                            <h4 class="title font-serif"><a href="cn.bing.com">基于Jquery的侧边栏插件,在我的Github已开源</a></h4>
                            <p class="description"><span class="invisible">空格</span>在我的github已开源的博客项目</p>
                            <div class="time"><i class="fa fa-calendar"></i>&nbsp;2016-04-11 11:00:33</div>
                            <div class="wm-category-sm inline-block">
                                <a href="" class="tag-piece-sm tag-piece-LightPink">程序</a>
                                <a href="" class="tag-piece-sm tag-piece-sauce">生活</a>
                            </div>
                            <div class="wm-tag-sm inline-block">
                                <a href="" class="tag-piece-sm tag-piece-conifer">Javascript</a>
                                <a href="" class="tag-piece-sm tag-piece-RedGold">HTML</a>
                                <a href="" class="tag-piece-sm tag-piece-ultramarine">Node</a>
                            </div>
                            <div class="footer">
                                <div class="comment inline-block">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <a href="">1,231 评论</a>
                                </div>
                                <div class="more pull-right">
                                    <a class="wm-label vm-label-scale wm-label-default" href="/article/">More>></a>
                                </div>
                            </div>
                        </article>
                    @endfor
                </div>
            </section>
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

</body>
</html>