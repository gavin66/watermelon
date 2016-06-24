/**
 * Created by Gavin on 16/2/19.
 */
var deps = [
    'jqueryExt',
    'lodash',
    'editormd',
    'toastr',
    'tagger',
    'editormd-plugins/link-dialog/link-dialog-debug',
    'editormd-plugins/reference-link-dialog/reference-link-dialog-debug',
    'editormd-plugins/image-dialog/image-dialog-debug',
    'editormd-plugins/code-block-dialog/code-block-dialog-debug',
    'editormd-plugins/table-dialog/table-dialog-debug',
    'editormd-plugins/emoji-dialog/emoji-dialog-debug',
    'editormd-plugins/goto-line-dialog/goto-line-dialog-debug',
    'editormd-plugins/help-dialog/help-dialog-debug',
    'editormd-plugins/html-entities-dialog/html-entities-dialog-debug',
    'editormd-plugins/preformatted-text-dialog/preformatted-text-dialog-debug',
    'seajs_css'
];

seajs.use(deps, function($,_,editormd,toastr) {
    seajs.use('/vendor/editor.md-1.5.0/css/editormd.min.css');
    seajs.use('/vendor/toastr-2.1.2/build/toastr.min.css');
    seajs.use('/vendor/tagger-master/dist/tagger.min.css');

    var clickable = true; // 更新按钮 的可点击性

    $tag = $('#tag');
    $tag_container = $('#tag-container');
    $category = $('#category');
    $category_container = $('#category-container');

    $form = $('#article-form');

    var editor = editormd('editormd', {
        width: '100%',
        height: 600,
        path : '/vendor/editor.md-1.5.0/lib/',
        //toolbar  : false,             // 关闭工具栏
        codeFold : true,
        searchReplace : true,
        saveHTMLToTextarea : true,      // 保存 HTML 到 Textarea
        htmlDecode : 'style,script,iframe|on*',            // 开启 HTML 标签解析，为了安全性，默认不开启
        emoji : true,
        taskList : true,
        tocm : true,          // Using [TOCM]
        tex : true,                      // 开启科学公式 TeX 语言支持，默认关闭
        //previewCodeHighlight : false,  // 关闭预览窗口的代码高亮，默认开启
        flowChart : true,                // 疑似 Sea.js与 Raphael.js 有冲突，必须先加载 Raphael.js ，Editor.md 才能在 Sea.js 下正常进行；
        sequenceDiagram : true,          // 同上
        //dialogLockScreen : false,      // 设置弹出层对话框不锁屏，全局通用，默认为 true
        //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为 true
        //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为 true
        //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为 0.1
        //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为 #fff
        imageUpload : true,
        imageFormats : ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
        imageUploadURL : './php/upload.php',
        onload: function(){
            this.setMarkdown($('#edit-md-text').val());
            //this.fullscreen();
            //this.unwatch();
            //this.watch().fullscreen();
            //this.setMarkdown("#PHP");
            //this.width("100%");
            //this.height(480);
            //this.resize("100%", 640);
        }
    });

    $tag.tagger({
        container: '#tag-container',
        color: 'random',
        divide: true,
        tags: $tag_container.attr('data-tags') ? JSON.parse($tag_container.attr('data-tags')) : []
    });

    $category.tagger({
        container: '#category-container',
        color: 'random',
        divide: true,
        tags: $category_container.attr('data-categories') ? JSON.parse($category_container.attr('data-categories')) : []
    });

    $('#save-article').on('click',function(){
        $.helpers.store({
            url: '/backend/article',
            data: getParams(),
            success: function(data){
                $('#backend_article').trigger('click');
            }
        });

    });

    $('#update-article').on('click',function(){
        if(clickable){
            clickable = false;
            $.helpers.update({
                url:'/backend/article/'+$form.attr('data-id'),
                data:getParams(),
                success:function(data){
                    window.setTimeout(function(){
                        clickable = true;
                    },3000);
                }
            });
        }else{
            toastr.warning('请休息3秒再提交更新');
        }
    });


    var getParams = function(){
        var params = $form.serializeJson();

        if(params['editormd-markdown-doc']){
            params['content_md'] = params['editormd-markdown-doc'];
            delete params['editormd-markdown-doc'];
        }

        if(params['editormd-html-code']){
            params['content_html'] = params['editormd-html-code'];
            delete params['editormd-html-code'];
        }

        params['tags'] = JSON.stringify($tag.tagger('getTags'));
        params['categories'] = JSON.stringify($category.tagger('getTags'));

        return params;
    }

});

