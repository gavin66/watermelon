/**
 * Created by Gavin on 16/2/14.
 */
seajs.config({
    base  : '/vendor/',
    charset : 'utf-8',
    paths: {
        'editormd-plugins': 'editor.md-1.5.0/plugins'
    },
    alias : {
        seajs_css : 'seajs-3.0.0/plugins/seajs-css-master/dist/seajs-css',
        jquery   : 'jquery-2.2.0/jquery-2.2.0', // 添加了对cmd规范的代码
        jqueryWatermelon: '/script/extend/jquery.watermelon', // 本博客的 jquery 插件
        editormd : 'editor.md-1.5.0/editormd-debug',
        bootstrap: 'bootstrap-3.3.5/dist/js/bootstrap-debug',
        particlesJS: 'particles.js-2.0.0/particles.min',
        velocity: 'velocity-1.2.3/velocity.min',
        jquery_sidebar: 'jquery-sidebar/dist/jquery-sidebar.min',
        metisMenu: 'metisMenu-2.4.0/dist/metisMenu-debug',
        pjax: 'jquery-pjax-1.9.6/jquery.pjax-debug',
        summernote: 'summernote-0.7.0/summernote.min',
        bootstrap_table: 'bootstrap-table-1.10.1/dist/bootstrap-table-debug',
        bootstrap_table_locale: 'bootstrap-table-1.10.1/dist/locale/bootstrap-table-zh-CN-debug',

        tagger: 'tagger-1.0.0/dist/tagger-debug', // 标签生成器

        // 图片上传的 jquery 插件
        jqueryUiWidget: 'jQuery-File-Upload-9.12.5/js/vendor/jquery.ui.widget',
        jqueryIframeTransport: 'jQuery-File-Upload-9.12.5/js/jquery.iframe-transport',
        jqueryFileUpload: 'jQuery-File-Upload-9.12.5/js/jquery.fileupload.js',

        APlayer: 'APlayer-master/dist/APlayer.min.js', // 音频播放器
        sweetalert: 'sweetalert-1.1.3/dist/sweetalert.min.js', // 弹出框插件
        toastr: 'toastr-2.1.2/toastr-debug', // 通知提示插件  已改造为cmd规范

        scrollspy: 'scrollspy-ex-1.0.0/dev/scrollspy-ex', // 滚动监听

        //Raphael: 'editor.md-1.5.0/lib/raphael.min',
        underscore: 'underscore-1.8.3/underscore-min',
        //lodash: 'lodash-4.6.1/dist/lodash.min'
        lodash: 'lodash-4.6.1/dist/lodash',



        jquery2:'seajs-3.0.0/examples-master/sea-modules/jquery/jquery/1.10.1/jquery-debug' // 测试 seajs 加载 jquery

    }
});