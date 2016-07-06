<!-- 导航栏 -->
@if(isset($underpainting) && $underpainting == 'white')
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
@else
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
@endif