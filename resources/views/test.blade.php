<!DOCTYPE html>
<html lang="zh-CN">
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

    <link href="{{ asset('/style/app.css') }}" rel="stylesheet">

    @section('css')

    @show

</head>
<body>
<header class="navbar navbar-blue navbar-static-top" id="top" role="navigation">
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

<div class="jumbotron jumbotron-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-center">
                <h1>Gavin's Blog</h1>
                <p>我就是个测试页</p>
                <ul class="list-inline">
                    <li><a href="https://github.com/gavin66" target="_blank"><i class="fa fa-github"></i>Github</a></li>
                    <li>·</li>
                    <li><a href="http://weibo.com/lanbert" target="_blank"><i class="fa fa-weibo"></i>微博</a></li>
                    <li>·</li>
                    <li><a href="https://www.zhihu.com/people/Gavin23" target="_blank">知乎</a></li>
                </ul>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>

@section('content')
    <button type="button" class="btn btn-primary btn-sm" id="alert-article">
        提示弹出</button>
    {{ dd(returnData('30001')) }}
@show

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

<div class="back-to-top" style="display: none;">
    <span class="fa fa-chevron-up"></span>
</div>

@section('beforeJS')

@show
<script src="{{ asset('/vendor/seajs-3.0.0/dist/sea.js') }}" ></script>
<script src="{{ asset('/script/config/seajs-config.js') }}"></script>
<script src="{{ asset('/script/test.js') }}" ></script>

@section('endJS')

@show

</body>
</html>