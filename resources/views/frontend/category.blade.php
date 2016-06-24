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
    <link rel="shortcut icon" href="/img/Monkey_D_Luffey.ico">
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
<div class="jumbotron jumbotron-sauce">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h1 class="font-serif">Category & Tag</h1>
            </div>
        </div>
    </div>
</div>

<!-- 分类与标签 -->
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="category-tag-content box-shadow">
                <div class="category-all">
                    <br>
                    <ul class="list-inline text-center">
                        <li><a href="#">编程<span class="badge">23</span></a></li>
                        <li><a href="#">前端 <span class="badge">26</span></a></li>
                        <li><a href="#">后端 <span class="badge">32</span></a></li>
                        <li><a href="#">生活 <span class="badge">123</span></a></li>
                        <li><a href="#">笔记 <span class="badge">12</span></a></li>
                        <li><a href="#">小说 <span class="badge">4</span></a></li>
                        <li><a href="#">体育 <span class="badge">6</span></a></li>
                        <li><a href="#">冒险 <span class="badge">3</span></a></li>
                    </ul>
                    <br>
                </div>
                <div class="count text-center">
                    <p><span>10&nbsp;</span>个分类&nbsp;&nbsp;<span>22&nbsp;</span>个标签</p>
                    <br>
                </div>
                <div class="tag-cloud text-center">
                    <ul class="list-inline text-center font-serif">
                        <li><a href="#" class="tag-1">php</a></li>
                        <li><a href="#" class="tag-2">redis</a></li>
                        <li><a href="#" class="tag-4">编程</a></li>
                        <li><a href="#" class="tag-3">es</a></li>
                        <li><a href="#" class="tag-3">系统</a></li>
                        <li><a href="#" class="tag-7">html</a></li>
                        <li><a href="#" class="tag-1">php</a></li>
                        <li><a href="#" class="tag-2">redis</a></li>
                        <li><a href="#" class="tag-4">ps</a></li>
                        <li><a href="#" class="tag-2">教程</a></li>
                        <li><a href="#" class="tag-3">es</a></li>
                        <li><a href="#" class="tag-5">ruby</a></li>
                        <li><a href="#" class="tag-3">系统</a></li>
                        <li><a href="#" class="tag-7">极客</a></li>
                        <li><a href="#" class="tag-1">nodejs</a></li>
                        <li><a href="#" class="tag-1">php</a></li>
                        <li><a href="#" class="tag-2">redis</a></li>
                        <li><a href="#" class="tag-4">CSS</a></li>
                        <li><a href="#" class="tag-5">生活</a></li>
                        <li><a href="#" class="tag-6">博客</a></li>
                        <li><a href="#" class="tag-4">python</a></li>
                        <li><a href="#" class="tag-1">php</a></li>
                        <li><a href="#" class="tag-2">redis</a></li>
                        <li><a href="#" class="tag-4">编程</a></li>
                        <li><a href="#" class="tag-3">es</a></li>
                        <li><a href="#" class="tag-3">系统</a></li>
                        <li><a href="#" class="tag-7">Linux</a></li>
                        <li><a href="#" class="tag-7">java</a></li>
                        <li><a href="#" class="tag-6">js</a></li>
                        <li><a href="#" class="tag-1">jquery</a></li>
                        <li><a href="#" class="tag-1">多说</a></li>
                        <li><a href="#" class="tag-2">excel</a></li>
                        <li><a href="#" class="tag-4">word</a></li>
                        <li><a href="#" class="tag-5">spl</a></li>
                        <li><a href="#" class="tag-6">缓存</a></li>
                        <li><a href="#" class="tag-4">windows</a></li>
                        <li><a href="#" class="tag-1">mac</a></li>
                        <li><a href="#" class="tag-2">markdown</a></li>
                        <li><a href="#" class="tag-4">sublime</a></li>
                    </ul>
                    <br>
                </div>
            </div>
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

<!-- 粒子背景 -->
{{--<div id="particles-js"></div>--}}
<canvas id="evanyou" width="2880" height="756"></canvas>

<!-- 返回顶端 -->
<div class="back-to-top" style="display: none;">
    <span class="fa fa-chevron-up"></span>
</div>

<!-- 加载JS -->
<script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
<script src="{{ asset('/vendor/seajs-3.0.0/dist/sea.js') }}"></script>
<script src="{{ asset('/script/config/seajs-config.js') }}"></script>

<script src="{{ asset('/script/app.js') }}" ></script>

</body>
</html>