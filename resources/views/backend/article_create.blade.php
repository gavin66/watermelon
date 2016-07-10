<div class="row">
    <div class="col-sm-12">
        <h4 class="nav-title">撰写新文章</h4>
    </div>
</div>
<div class="row">
    <form id="article-form" autocomplete="off" data-id="{{ $article['id'] or '' }}">
        <div class="col-md-9">
            <div class="row">
                <div class="col-sm-12">
                    <!-- 文章标题 -->
                    <input type="text" class="form-control atc-tit-ipt" id="title-article" name="title"
                           placeholder="标题" value="{{ $article['title'] or '' }}" >
                    <!-- 文章的概要 主要用在前台显示的列表上 -->
                    <textarea class="form-control atc-tit-ipt" placeholder="简述" name="outline" id="outline-article" rows="3">{{ $article['outline'] or '' }}</textarea>
                    <!-- 修改时,editmd中的内容 -->
                    <input type="hidden"  id="edit-md-text" value="{{ $article['content_md'] or '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="editormd"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            发布
                        <span class="glyphicon glyphicon-triangle-bottom pull-right" role="button"
                              data-toggle="collapse" href="#release-toggle" aria-expanded="false"
                              aria-controls="release-toggle">
                        </span>
                        </div>
                        <ul class="list-group collapse in" id="release-toggle">
                            <li class="list-group-item">保存草稿
                                <select title="状态" class="form-control" name="status" >
                                    <option>草稿</option> {{-- selected disabled value --}}
                                    <option>预览</option>
                                    <option>发布</option>
                                </select>
                            </li>
                            <li class="list-group-item">状态:草稿 编辑</li>
                            <li class="list-group-item">公开度:公开 编辑</li>
                            <li class="list-group-item">发布时间: 编辑</li>
                            <li class="list-group-item">
                                <span class="shift-trash">移至回收站</span>
                                @if( isset($article['id']) )
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="update-article">
                                        更新</button>
                                @else
                                    <button type="button" class="btn btn-primary btn-sm pull-right" id="save-article">
                                        保存</button>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            分类
                        <span class="glyphicon glyphicon-triangle-bottom pull-right" role="button"
                              data-toggle="collapse" href="#category-toggle" aria-expanded="false"
                              aria-controls="category-toggle">
                        </span>
                        </div>
                        <ul class="list-group collapse in" id="category-toggle">
                            <li class="list-group-item">
                                <div class="tagger-box inline-block">
                                    <input type="text" id="category" class="tagger-input" placeholder="添加标签,以空格分割">
                                </div>
                                <a class="btn btn-default" href="#" role="button" id="">添加</a>
                                <div id="category-container" data-categories="{{ $article['categories'] or '' }}"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            标签
                            <span class="glyphicon glyphicon-triangle-bottom pull-right" role="button"
                                  data-toggle="collapse" href="#tag-toggle" aria-expanded="false"
                                  aria-controls="tag-toggle">
                            </span>
                        </div>
                        <ul class="list-group collapse in" id="tag-toggle">
                            <li class="list-group-item">
                                <div class="tagger-box inline-block">
                                    <input type="text" id="tag" class="tagger-input" placeholder="添加标签,以空格分割">
                                </div>
                                <a class="btn btn-default" href="#" role="button" id="">添加</a>
                                <div id="tag-container" data-tags="{{ $article['tags'] or '' }}"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
    <?php echo getFileAllContents(public_path().'/script/backend/article.create.js'); ?>
</script>