@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/APlayer-master/dist/APlayer.min.css') }}">
@endsection

@section('navbar')
    @include('layouts/navbar',[ 'underpainting'=>'white' ])
@endsection


@section('jumbotron')
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
@endsection


@section('content')
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
@endsection


<!-- 加载JS -->
@section('beforeJS')
    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
@endsection

@section('endJS')
    <script src="{{ asset('/script/frontend/article.js') }}" ></script>
@endsection