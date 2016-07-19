<div class="row">
    <div class="col-xs-12">
        <h4>媒体库
            <button class="btn btn-success btn-xs fileinput-button">
                <!--<i class="glyphicon glyphicon-plus"></i>-->
                <span>添加</span>
                <!--<input type="file" name="files[]" multiple="">-->
                <input id="file-upload" type="file" name="files[]" multiple>
            </button>
            <span id="tttt"></span>
        </h4>
    </div>
    <div class="col-xs-12">
        <div class="media-toolbar">
            <div class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="media-attachment-filter-type">类型筛选</label>
                    <select class="form-control input-sm" id="media-attachment-filter-type">
                        <option value="all">所有</option>
                        <option value="image">图像</option>
                        <option value="audio">音频</option>
                        <option value="video">视频</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="media-attachment-filter-date">类型筛选</label>
                    <select class="form-control input-sm" id="media-attachment-filter-date">
                        <option value="all">全部</option>
                        <option value="0">2016-07</option>
                        <option value="1">2016-06</option>
                    </select>
                </div>
                <button type="button" class="btn btn-default btn-sm">批量选择</button>
                <div class="form-group pull-right">
                    <label class="sr-only" for="media-attachment-filter-search">搜索</label>
                    <input type="text" class="form-control input-sm" id="media-attachment-filter-search" placeholder="搜索">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <ul class="list-inline clear-margin" id="file-list">
        </ul>
    </div>
</div>

<script type="text/x-template" id="template-attachment">
    <li class="attachment">
        <div class="attachment-preview">
            <div class="thumbnail-preview">
                <div class="centered">
                    <img src="<%- file['thumbnail_url'] %>" alt="<%- file['name'] %>" data-id="<%- file['id'] %>">
                </div>
            </div>
        </div>
    </li>
</script>

<script type="text/x-template" id="template-attachment-action">
    <li class="attachment">
        <div class="attachment-preview" style="cursor: default;">
            <div class="thumbnail-preview upload-button">
                <button type="button" class="btn btn-default btn-xs"> 开始上传 </button>
            </div>
        </div>
    </li>
</script>

<script type="text/x-template" id="template-attachment-progress">
    <div class="progress" style="margin: 0 10px;border-radius: 0">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2rem; width: 0;">
            <span class="">0%</span>
        </div>
    </div>
</script>


<script>
    <?php echo getFileAllContents(public_path() . '/script/backend/media.js'); ?>
</script>

