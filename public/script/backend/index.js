/**
 * Created by Gavin on 16/1/30.
 */
var deps = [
    'bootstrap',
    'pjax',
    'metisMenu',
    'jquery_sidebar'
];

seajs.use(deps, function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    new $.jqSidebar({
        leftMode: 'sidebar-turn',
        autoClose: false
    });

    $('#metisMenu').metisMenu();

    $(document).pjax('a[data-pjax=true]', '#pjax-container',
        {
            timeout:650,
            maxCacheLength:20
        }
    );

});
