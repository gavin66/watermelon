<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--移动设备优先,为了确保适当的绘制和触屏缩放，需要在 <head> 之中添加 viewport 元数据标签。-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <!-- 在移动设备浏览器上，通过为视口（viewport）设置 meta 属性为 user-scalable=no 可以禁用其缩放（zooming）功能。
    这样禁用缩放功能后，用户只能滚动屏幕，就能让你的网站看上去更像原生应用的感觉。注意，这种方式不推荐所有网站使用，需看情况而定-->
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="博客,个人博客,Gavin的博客,田宇的博客">
    <meta name="description" content="这是田宇(Gavin)的个人网站">
    <!-- Laravel token 存放在 meta 标签中, 然后使用 jQuery 将它加入到所有的请求头中-->
    <meta name="csrf-token" content="{{ csrf_token()}}" />
    {{--<link rel="shortcut icon" href="/favicon.ico">--}}

    <title>Gavin'blog</title>

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-3.3.5/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome-4.5.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/animate.css-3.5.1/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/backend/index.css') }}">

</head>
<body>
    <div class="jqsb-container">
        <nav class="navbar navbar-site">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#blog-navbar" aria-expanded="false">
                        <span class="sr-only">导航条开关</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand jqsb-toggle-left " href="#">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="blog-navbar">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="站内搜索">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">消息通知</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#" class="sb-toggle-right">设置</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main" id="pjax-container">

        </div>
        <footer class="footer">©&nbsp;2014 - 2016&nbsp;&nbsp;Gavin's Blog &nbsp;</footer>
    </div>

    <div class="jqsb-sidebar jqsb-left">
        <div class="jqsb-left-sm">
            <ul class="sm-item-list">
                <li class="personal-icon"><a href="#"><img src="/img/Monkey_D_Luffey.ico" alt="图标"></a></li>
                <li><a href="#" data-toggle="tooltip" data-trigger="hover" data-placement="right" title="文章" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-book"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="多媒体" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-film"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="评论" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-comment"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="外观" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="用户" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-user"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="工具" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-th-list"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="设置" data-container=".sidebar-tooltip"><i class="glyphicon glyphicon-cog"></i></a></li>
            </ul>
        </div>
        <div class="jqsb-left-bg">
            <ul class="metismenu" id="metisMenu">
                <li class="user-info">
                    <img class="user-portrait img-rounded" src="http://7xp2cl.com1.z0.glb.clouddn.com/portrait%20200x200.jpg" alt="头像">
                    <div class="user-info-dropdown">
                        <a class="dropdown-toggle cancelDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="user-name block">{{ $user['name'] }}</span>
                            <span class="user-role block">超级管理员<span class="caret"></span></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft20">
                            <li><a href="#">修改头像</a></li>
                            <li><a href="#">个人资料</a></li>
                            <li><a href="#">信箱</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">退出</a></li>
                        </ul>
                    </div>
                </li>
                <li class="active">
                    <a class="item-link" href="#" aria-expanded="true">
                        <i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                        <span class="">文章</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="true">
                        <li><a id="backend_article" href="{{ url(config('watermelon.backend_article')) }}" data-pjax="true">文章列表</a></li>
                        <li><a id="backend_article_create" href="{{ url(config('watermelon.backend_article_create')) }}" data-pjax="true">写文章</a></li>
                        <li><a id="backend_category" href="{{ url(config('watermelon.backend_category')) }}" data-pjax="true">分类</a></li>
                        <li><a id="backend_tag" href="{{ url(config('watermelon.backend_tag')) }}" data-pjax="true">标签</a></li>
                    </ul>
                </li>
                <li >
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-film" aria-hidden="true"></i>
                        <span>多媒体</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a id="backend_media" href="{{ url(config('watermelon.backend_media')) }}" data-pjax="true">媒体库</a></li>
                        <li><a id="backend_media_create" href="{{ url(config('watermelon.backend_media_create')) }}" data-pjax="true">添加</a></li>
                    </ul>
                </li>
                <li>
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
                        <span>评论</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a href="#">评论1</a></li>
                        <li><a href="#">评论2</a></li>
                        <li><a href="#">评论3</a></li>
                    </ul>
                </li>
                <li>
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                        <span>外观</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a href="#">主题</a></li>
                        <li><a href="#">自定义</a></li>
                        <li><a href="#">小工具</a></li>
                        <li><a href="#">菜单</a></li>
                        <li><a href="#">顶部</a></li>
                        <li><a href="#">背景</a></li>
                        <li><a href="#">编辑</a></li>
                    </ul>
                </li>
                <li>
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        <span>用户</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a href="#">所有用户</a></li>
                        <li><a href="#">添加用户</a></li>
                        <li><a href="#">我的资料</a></li>
                    </ul>
                </li>
                <li>
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                        <span>工具</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a href="#">可用工具</a></li>
                        <li><a href="#">导入</a></li>
                        <li><a href="#">导出</a></li>
                    </ul>
                </li>
                <li>
                    <a class="item-link" href="#" aria-expanded="false">
                        <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                        <span>设置</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="item-list" aria-expanded="false">
                        <li><a href="#">基本</a></li>
                        <li><a href="#">文章</a></li>
                        <li><a href="#">评论</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- 侧边栏的工具提示层 -->
    <div class="sidebar-tooltip"></div>

    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
    <script src="{{ asset('/vendor/seajs-3.0.0/dist/sea.js') }}" ></script>
    <script src="{{ asset('/script/config/seajs-config.js') }}" ></script>
    <script src="{{ asset('/script/backend/index.js') }}" ></script>

</body>
</html>