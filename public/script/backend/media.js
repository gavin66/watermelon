/**
 * Created by Gavin on 16/5/29.
 */
/**
 * Created by Gavin on 16/5/29.
 */

var deps = [
    'jquery',
    'lodash',
    'toastr',
    'jqueryUiWidget',
    'jqueryIframeTransport',
    'jqueryFileUpload',
    'pjax',
    'bootstrap',
    'sweetalert',
    'jqueryWatermelon',
    'seajs_css'
];

seajs.use(deps, function($,_,toastr) {
    seajs.use('/vendor/toastr-2.1.2/build/toastr.min.css');
    seajs.use('sweetalert-1.1.3/dist/sweetalert.css');

    var $fileList = $('#file-list');
    var template_attachment = $('#template-attachment').text();
    var template_attachment_action = $('#template-attachment-action').text();
    var template_attachment_progress = $('#template-attachment-progress').text();


    $(function(){
        $.get('/api/getFiles.json',{},function(files){
            _.forEach(files,function(file){
                //$fileList.append(  _.template( template_attachment )( { 'file': file } ) );

                $attachment_ele = $(_.template( template_attachment )( { 'file': file } ));
                $attachment_ele.appendTo($fileList).on('click','img',{'attachmentEle':$attachment_ele},function(event){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "你确定删除标签吗?",
                        //text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是 , 删除它!",
                        cancelButtonText: "否 , 取消掉!",
                        //closeOnConfirm: false,
                        //closeOnCancel: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.helpers.destroy({
                                url: '/backend/media/' + id ,
                                data:{'id':id},
                                success:function(data){
                                    event.data.attachmentEle.remove();
                                }
                            });
                        } else {
                            //toastr.error('取消删除 !');
                        }
                    });

                });
            });
        },'json');

        $('#file-upload').fileupload({
            url:'/backend/media',
            dataType: 'json',
            autoUpload: true,
            add: function (e, data) {
                data.context = {};

                data.context.attachment = $( _.template( template_attachment_action )( {} ) ).appendTo($fileList);

                data.context.attachment.find('button').click(function(){
                    data.context.progress = $( _.template( template_attachment_progress )( {} )).replaceAll( $(this) );
                    data.submit();
                });

            },
            progress: function(e,data){
                var progress = parseInt(data.loaded / data.total * 100, 10);

                data.context.progress.children('.progress-bar').attr('aria-valuenow',progress).css('width',progress + '%')
                    .children('span').text(progress + '%');
            },
            progressall: function (e, data) {


            },
            done: function (e, data) {
                _.forEach(data.result.files,function(file){
                    $attachment_ele = $(_.template( template_attachment )( { 'file': file } )).replaceAll( data.context.attachment );

                    $attachment_ele.on('click','img',{'attachmentEle':$attachment_ele},function(event){
                        var id = $(this).attr('data-id');
                        swal({
                            title: "你确定删除标签吗?",
                            //text: "You will not be able to recover this imaginary file!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "是 , 删除它!",
                            cancelButtonText: "否 , 取消掉!",
                            //closeOnConfirm: false,
                            //closeOnCancel: false,
                            showLoaderOnConfirm: true
                        }, function(isConfirm){
                            if (isConfirm) {
                                $.helpers.destroy({
                                    url: '/backend/media/' + id ,
                                    data:{'id':id},
                                    success:function(data){
                                        event.data.attachmentEle.remove();
                                    }
                                });
                            } else {
                                //toastr.error('取消删除 !');
                            }
                        });

                    });
                });
            }

        });
    });

});


