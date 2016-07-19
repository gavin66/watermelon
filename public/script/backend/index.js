/**
 * Created by Gavin on 16/1/30.
 */
var deps = [
    'jquery',
    'bootstrap',
    'pjax',
    'metisMenu',
    'jquery_sidebar',
    'jqueryWatermelon'
];

seajs.use(deps, function($) {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    new $.jqSidebar({
        leftMode: 'sidebar-turn',
        autoClose: false
    });

    $('#metisMenu').metisMenu({
        toggle:  true // 自动折叠
    });

    $(document).pjax('a[data-pjax=true]', '#pjax-container',
        {
            timeout:650,
            maxCacheLength:20
        }
    );

});
