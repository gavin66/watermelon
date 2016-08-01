@extends('app')

@section('content')
    <div class="container wrap-main" id="test">
        <div class="row">
            <section class="col-sm-9">
                @foreach($articles as $v)
                    <article class="article-list-entry box-shadow">
                        <div class="article-list-header">
                            <h3 class="title font-serif">
                                <a class="post-title-link" itemprop="url"
                                   href="{{ route('article',[$v['id']]) }}">{{ $v['title'] }}</a>
                                <small class="time">
                                    <i class="fa fa-calendar"></i>
                                    {{ $v['created_at'] }}
                                </small>
                            </h3>
                        </div>
                        <div class="article-list-content">
                            <p></p>
                            <p><span class="invisible">空格</span>{{ $v['outline'] }}</p>
                        </div>
                        <div class="article-list-footer">
                            <div class="wm-category inline-block">
                                @if( !is_null($v['categories']) )
                                    @foreach(json_decode($v['categories'],1) as $category)
                                        @include(' layouts/tagger', [ 'key'=>'categories', 'item' => $category])
                                    @endforeach
                                @endif
                            </div>
                            <div class="wm-tag inline-block">
                                @if(!is_null($v['tags']))
                                    @foreach(json_decode($v['tags'],1) as $tag)
                                        @include(' layouts/tagger', [ 'key' => 'tags', 'item' => $tag ])
                                    @endforeach
                                @endif
                            </div>
                            <div class="more pull-right">
                                <a class="wm-label vm-label-scale wm-label-default" href="{{ route('article',[$v['id']]) }}">More>></a>
                            </div>
                        </div>
                    </article>
                @endforeach

                {{--分页--}}
                @include('layouts/pagination', [ 'paginator' => $articles,'paginator_params' => $paginator_params ])

            </section>
            <section class="col-sm-3">
                <div class="sidebar-chunk article-tag box-shadow">
                    <p class="sc-label inline-block">标签云</p>
                    <div class="tag-cloud text-center">
                        <ul class="list-inline text-center font-serif">
                            @include('layouts/tag_cloud')
                        </ul>
                    </div>
                </div>
                <div class="sidebar-chunk article-category box-shadow">
                    <p class="sc-label inline-block">分类</p>
                    <ul class="list-unstyled font-serif">
                        @foreach(getCategoryCountData() as $category=>$num)
                                <li><a href="{{ url('?categories='.$category) }}">{{ $category }}</a></li>
                        @endforeach
                    </ul>
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
            </section>
        </div>
    </div>
@endsection

@section('js')

@stop