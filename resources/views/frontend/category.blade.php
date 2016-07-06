@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/APlayer-master/dist/APlayer.min.css') }}">
@stop

@section('navbar')
    @include('layouts/navbar',[ 'underpainting'=>'white' ])
@endsection


@section('jumbotron')
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
@endsection


@section('content')
    <!-- 分类与标签 -->
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="category-tag-content box-shadow">
                    <div class="category-all">
                        <br>
                        <ul class="list-inline text-center">
                            @foreach(getCategoryCountData() as $category=>$num)
                                <li><a href="javascript:void(0)">{{ $category }}<span class="badge">{{ $num }}</span></a></li>
                            @endforeach
                        </ul>
                        <br>
                    </div>
                    <div class="count text-center">
                        <p><span>{{ getCategoryCountLength() }}&nbsp;</span>个分类&nbsp;&nbsp;<span>{{ getTagCountLength() }}&nbsp;</span>个标签</p>
                        <br>
                    </div>
                    <div class="tag-cloud text-center">
                        <ul class="list-inline text-center font-serif">
                            @include('layouts/tag_cloud')
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<!-- 加载JS -->
@section('beforeJS')
    <script src="{{ asset('/vendor/editor.md-1.5.0/lib/raphael.min.js') }}"></script>
@endsection
