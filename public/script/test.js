/**
 * Created by Gavin on 16/2/15.
 */
var deps = [
    'jqueryExt',
    'toastr',
    'seajs_css'
];
seajs.use(deps,function($,toastr){
    seajs.use('/plug-in/toastr-2.1.2/build/toastr.min.css');
    $('#alert-article').on('click',function(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr.success('这个东西成功了', 'OK');

    });


});