@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/APlayer-master/dist/APlayer.min.css') }}">
@endsection

@section('navbar')
    @include('layouts/navbar',[ 'underpainting'=>'white' ])
@endsection

@section('jumbotron')
    <!-- 巨幕 -->
    <div class="jumbotron jumbotron-conifer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h1 class="font-serif">About</h1>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- 关于我 详细信息 -->
    <section class="container">
        <div class="row">
            <section class="col-xs-12 col-md-8">
                <!-- editor.md预览 start-->
                <article class="box-shadow" id="markdown-view" >
                    <textarea style="display:none;" id="markdown-text">{{ $content_md }}</textarea>
                </article>
                <!-- editor.md end-->

                <!-- 多说评论框 start -->
                <div id="ds-comment-frame" class="ds-thread box-shadow" data-thread-key="{{ route('article',$id) }}"
                     data-title="{{ $title }}" data-url="/article/{{ $id }}"
                     data-short-name="{{ config('watermelon.ds_short_name') }}" ></div>
                <!-- 多说评论框 end -->
            </section>
            <section class="col-md-4 hidden-xs hidden-sm">
                <div class="sidebar-chunk profile box-shadow">
                    <table class="site-author">
                        <tr>
                            <td><img class="img-rounded img-responsive" src="/img/head.jpg" alt="头像"></td>
                            <td>
                                <div class="text-center">
                                    <h4 class="author-name">Gavin</h4>
                                    {{--<p>当你的才华还撑不起你的野心时，你就应该静下心来学习。</p>--}}
                                    <p class="motto">宁愿小众,不愿平庸</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="social text-center">
                        <a class="fa fa-weibo share-icon share-icon-weibo" id="ds-reset" title="新浪微博"></a>
                        <a class="fa fa-tencent-weibo share-icon share-icon-tweibo" id="ds-reset" title="腾讯微博"></a>
                        <a class="fa fa-weixin share-icon share-icon-weixin" id="ds-reset" title="微信"></a>
                        <a class="fa fa-qq share-icon share-icon-qq" id="ds-reset" title="QQ"></a>
                        <a class="fa fa-renren share-icon share-icon-renren" id="ds-reset" title="人人"></a>

                        {{--<a class="iconfont icon-douban share-icon share-icon-douban" id="ds-reset" title="豆瓣"></a>--}}
                        {{--<a class="iconfont icon-baidu share-icon share-icon-baidu" id="ds-reset" title="百度"></a>--}}
                        {{--<a class="iconfont icon-youdao share-icon share-icon-youdao" id="ds-reset" title="有道云笔记"></a>--}}

                        <a class="fa fa-google-plus share-icon share-icon-google-plus" id="ds-reset" title="Google+"></a>
                        <a class="fa fa-facebook share-icon share-icon-facebook" id="ds-reset" title="Facebook"></a>
                        <a class="fa fa-twitter share-icon share-icon-twitter" id="ds-reset" title="Twitter"></a>
                        {{--<a class="fa fa-linkedin share-icon share-icon-linkedin" id="ds-reset" title="LinkedIn"></a>--}}
                    </div>
                </div>

                <div class="sidebar-chunk music-player box-shadow">
                    <div id="aPlayer" class="aplayer"></div>
                </div>
                {{--<div class="sidebar-chunk article-hot box-shadow">--}}
                    {{--<p class="sc-label inline-block">最热文章</p>--}}
                    {{--<ul class="list-unstyled font-serif">--}}
                        {{--@foreach(DuoShuo::getHotArticles([],false) as $article)--}}
                            {{--<li><a href="{{ route('article',[$article['thread_key']]) }}">{{ $article['title'] }}</a>--}}
                                {{--<span class="comment">&nbsp;&nbsp;-&nbsp;&nbsp;{{ $article['comments'] }} 评论</span>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <div class="thumbs box-shadow text-center">
                    <span id="thumbs-up" class="fa fa-thumbs-o-up" aria-hidden="true"></span>
                    <span class="thumbs-up-count">{{ getThumbsUpCount() }}</span>
                </div>
            </section>
        </div>
    </section>
@endsection


@section('beforeJS')
    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
@show

@section('endJS')
    <script src="{{ asset('/script/frontend/about.js') }}" ></script>
@endsection