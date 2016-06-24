@extends('app')

@section('content')
    <div class="container wrap-main" id="test">
        <div class="row">
            <section class="col-sm-9">
                @foreach($articles as $v)
                    <article class="article-list-entry box-shadow">
                        <div class="article-list-header">
                            <h3 class="title font-serif">
                                <a class="post-title-link" itemprop="url" href="/article/{{ $v['id'] }}">{{ $v['title'] }}</a>
                                <small class="time">
                                    <i class="fa fa-calendar"></i>
                                    {{ $v['created_at'] }}
                                </small>
                            </h3>
                        </div>
                        <div class="article-list-content">
                            <p></p>
                            <p><span class="invisible">空格</span>{{$v['outline']}}</p>
                        </div>
                        <div class="article-list-footer">
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
                            <div class="more pull-right">
                                <a class="wm-label vm-label-scale wm-label-default" href="/article/{{ $v['id'] }}">More>></a>
                            </div>
                        </div>
                    </article>
                @endforeach

                {{-- 分页 --}}
                @include('tool/pagination', ['paginator' => $articles])

            </section>
            <section class="col-sm-3">
                <div class="sidebar-chunk article-tag box-shadow">
                    <p class="sc-label inline-block">标签</p>
                    <div class="tag-cloud text-center">
                        <ul class="list-inline text-center font-serif">
                            <li><a href="javascript:void(0)" class="tag-1">php</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">redis</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">编程</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">es</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">系统</a></li>
                            <li><a href="javascript:void(0)" class="tag-7">html</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">php</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">redis</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">ps</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">教程</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">es</a></li>
                            <li><a href="javascript:void(0)" class="tag-5">ruby</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">系统</a></li>
                            <li><a href="javascript:void(0)" class="tag-7">极客</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">nodejs</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">php</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">redis</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">CSS</a></li>
                            <li><a href="javascript:void(0)" class="tag-5">生活</a></li>
                            <li><a href="javascript:void(0)" class="tag-6">博客</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">python</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">php</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">redis</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">编程</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">es</a></li>
                            <li><a href="javascript:void(0)" class="tag-3">系统</a></li>
                            <li><a href="javascript:void(0)" class="tag-7">Linux</a></li>
                            <li><a href="javascript:void(0)" class="tag-7">java</a></li>
                            <li><a href="javascript:void(0)" class="tag-6">js</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">jquery</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">多说</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">excel</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">word</a></li>
                            <li><a href="javascript:void(0)" class="tag-5">spl</a></li>
                            <li><a href="javascript:void(0)" class="tag-6">缓存</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">windows</a></li>
                            <li><a href="javascript:void(0)" class="tag-1">mac</a></li>
                            <li><a href="javascript:void(0)" class="tag-2">markdown</a></li>
                            <li><a href="javascript:void(0)" class="tag-4">sublime</a></li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-chunk article-category box-shadow">
                    <p class="sc-label inline-block">分类</p>
                    <ul class="list-unstyled font-serif">
                        <li><a href="javascript:void(0)">Unix/Linux</a></li>
                        <li><a href="javascript:void(0)">PHP</a></li>
                        <li><a href="javascript:void(0)">Java</a></li>
                        <li><a href="javascript:void(0)">程序设计</a></li>
                        <li><a href="javascript:void(0)">资源</a></li>
                        <li><a href="javascript:void(0)">生活随笔</a></li>
                        <li><a href="javascript:void(0)">读书笔记</a></li>
                        <li><a href="javascript:void(0)">转载好文</a></li>
                        <li><a href="javascript:void(0)">在路上</a></li>
                    </ul>
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
            </section>
        </div>
    </div>
@stop

@section('js')

@stop