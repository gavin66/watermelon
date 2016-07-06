@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/APlayer-master/dist/APlayer.min.css') }}">
@endsection

@section('navbar')
    @include('layouts/navbar',[ 'underpainting'=>'white' ])
@endsection


@section('jumbotron')
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
@endsection


@section('content')
    <!-- 关于我 详细信息 -->
    <section class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <section class="timeline">
                    <div class="timeline-body">
                        @foreach($archive as $month=>$articles)
                            <div class="timeline-date text-center">
                                <h3 class="inline-block box-shadow font-serif">{{ $month }}</h3>
                            </div>
                            @foreach($articles as $index=>$article)
                                <article class="timeline-box {{ $index%2 == 0 ? 'left' : 'right'}} box-shadow ">
                                    <h4 class="title font-serif"><a href="/article/{{ $article['id'] }}">{{ $article['title'] }}</a></h4>
                                    <p class="description"><span class="invisible">空格</span>{{ $article['outline'] }}</p>
                                    <div class="time"><i class="fa fa-calendar"></i>&nbsp;{{ $article['created_at'] }}</div>
                                    <div class="wm-category-sm inline-block">
                                        @if( !is_null($article['categories']) )
                                            @foreach(json_decode($article['categories'],1) as $item)
                                                @include(' layouts/tagger', ['size'=>'small','tag' => $item])
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="wm-tag-sm inline-block">
                                        @if(!is_null($article['tags']))
                                            @foreach(json_decode($article['tags'],1) as $item)
                                                @include(' layouts/tagger', ['size'=>'small','tag' => $item])
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="footer">
                                        <div class="comment inline-block pull-left">
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                            <span>{{ DuoShuo::getCommentsCountByArticleId($article['id'])[$article['id']]['comments'] }} 评论</span>
                                        </div>
                                        <div class="more pull-right">
                                            <a class="wm-label vm-label-scale wm-label-default" href="/article/{{ $article['id'] }}">More>></a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

<!-- 加载JS -->
@section('beforeJS')
    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
@endsection