/**
 * Created by Gavin on 16/5/29.
 */
/**
 * Created by Gavin on 16/5/29.
 */

var deps = [
    'jquery',
    'toastr',
    'pjax',
    'bootstrap',
    'bootstrap_table',
    'bootstrap_table_locale',
    'sweetalert',
    'jqueryWatermelon',
    'seajs_css'
];

seajs.use(deps, function($,toastr) {
    seajs.use('bootstrap-table-1.10.1/dist/bootstrap-table.min.css');
    seajs.use('/vendor/toastr-2.1.2/build/toastr.min.css');
    seajs.use('sweetalert-1.1.3/dist/sweetalert.css');

    $bst_table = $('#bst-table');
    $bst_table.bootstrapTable({
        locale:'zh_CN', // 本地语言,国际化
        classes: 'table table-no-bordered', // 表格样式,默认'table table-hover'有边框;'table-no-bordered'无边框
        undefinedText: '-', // 无数据时单元格显示的东西
        //height:200, // 表格高度
        //striped:true, // 表格的行是带条纹的
        //idField:'id', // 哪个字段是标识字段
        //uniqueId:'id', // 每一行的唯一标识符

        sortName:'id', // 默认排序列
        sortOrder:'desc', // 排序列排序方式,正序,倒序
        sortable:true, // 所用列可排序 配合列的sortable属性
        silentSort:false, // 静默排序

        iconsPrefix:'glyphicon', // 按钮图标前缀
        //iconSize:'xs', // 按钮尺寸
        //icons:'', // 按钮样式

        showHeader:true, // 显示表头
        //showFooter:true, // 显示表页脚
        checkboxHeader:false, // 表头显示全选checkbox
        clickToSelect:true, // 点击一行时,checkbox或者radio被选择
        singleSelect:true, // 只允许选择一行 和checkboxHeader只允许一个生效
        selectItemName:'btSelectItem', // radio 或者 checkbox 的 name 属性的值

        search:false, // 开启搜索 显示搜索框
        searchAlign:'left', // 搜索框显示位置
        searchOnEnterKey:true, // 按下回车进行搜索,不是按下任意键都搜索
        strictSearch:false, // 严格搜索,作用不详
        searchText: '', // 初始化的搜索文本
        searchTimeOut: 500,
        trimOnSearch: true, // 搜索文本去除首尾空格

        showPaginationSwitch:true, // 显示分页开关按钮
        paginationVAlign: 'bottom', // 分页按钮的显示位置
        paginationHAlign: 'right', // 分页按钮栏显示的位置
        paginationDetailHAlign: 'left' , // 分页详细信息显示的位置
        paginationPreText: '前一个',
        paginationNextText: '后一个',
        url: '/backend/category',
        method: 'get',
        cache: true,
        contentType: 'application/json',
        dataType: 'json',
        //ajaxOptions:{ //ajax 请求参数,回调等
        //
        //},
        //queryParams: function(params) { // 查询的参数,可以进行修改,添加
        //    return params;
        //},
        queryParamsType: 'limit', // 请求符合RESTFul规范
        sidePagination:'server', // 分页类型 客户端,服务端
        pageNumber:1, // 初始化显示哪页
        pageSize:10, // 单页显示条目数
        //onlyInfoPagination:true, // 只显示分页条数,没有分页尾部的按钮了
        //pageList:[10, 25, 50, 100, All], // 可选分页条数

        showRefresh:true, // 显示刷新按钮
        showToggle:true, // 显示卡片视图切换按钮
        showColumns:true, // 显示字段的下拉按钮
        pagination:true, // 显示分页按钮
        buttonsAlign:'right', // 按钮显示位置
        //cardView:true, // 默认初始化显示卡片视图
        //detailView:true, // 每一行前有一个 + 号,显示详细信息
        //detailFormatter: function(index, row, element){ // 详细信息格式化
        //    return 'hhhh';
        //},

        //toolbarAlign:'right', // 工具栏位置
        toolbar:'#bst-toolbar', // 指定工具栏 jquery选择器

        smartDisplay:true, // 作用不详
        escape:false, // 作用不详
        minimumCountColumns:1, //作用不详
        maintainSelected:false, // 作用不详


        columns: [{
            checkbox:true
        },{
            field: 'name',
            title: '标签名',
            //titleTooltip: '标题', // 列表title
            //class:'', // 列的类名称
            halign:'center', // 表头列对齐方式
            align: 'center', // 单元格数据水平对齐方式
            valign: 'middle', // 单元格数据垂直对齐方式
            falign: 'center', // 表页脚对齐方式
            //width: '10%',
            sortable: true, // 此列可排序
            order: 'asc', // 点击后默认排序方式
            //visible: true, // false 为隐藏列
            //switchable: true,
            //clickToSelect:true, // 点击后 checkbox或radio无响应
            formatter: function(value,row,index){ // 对数据进行格式化
                //console.log(value);
                //console.log(row);
                //console.log(index);
                return '<a href="/backend/category/' + row['id'] + '/edit" data-pjax="true" class="test">' + value + '</a>';
            },
            //footerFormatter: function(data){ // 表页脚数据格式化
            //
            //}
            //events:{ // 事件
            //    'click':function(e,value,row,index){
            //        alert(value);
            //    }
            //},
            //cellStyle: function(value, row, index){ // 列样式
            //    return {
            //        classes: 'text-nowrap another-class',
            //        css: {"color": "blue", "font-size": "50px"}
            //    };
            //}
        },{
            field: 'desc',
            title: '描述',
            halign:'center',
            align: 'center',
            sortable: true
        },{
            field: 'created_at',
            title: '新增时间',
            halign:'center',
            align: 'center',
            sortable: true
            //width: '20%'
        },{
            field: 'operation',
            title: '操作',
            halign:'center',
            align: 'center',
            sortable: false,
            //width: '20%'
            formatter: function(value,row,index){ // 对数据进行格式化
                //console.log(value);
                //console.log(row);
                //console.log(index);
                return '<a data-category-id="' + row['id'] + '" class="category-del">删除</a>';
            }
        }],
        rowStyle: function(row, index) { // 行样式
            //console.log(row);
            //var classes = ['active', 'success', 'info', 'warning', 'danger'];
            //if (index % 2 === 0 && index / 2 < classes.length) {
            //    return {
            //        classes: classes[index / 2]
            //    };
            //}
            return {};
        },
        rowAttributes: function(row, index){ // 行属性
            return{

            }
        },

        responseHandler:function(res){ // 返回的数据进行处理,格式化
            //var rows = res['rows'];
            //
            //for(var i=0;i<rows.length;i++){
            //    rows[i]['created_at'] = !rows[i]['created_at'] || rows[i]['created_at'].length <= 10 || rows[i]['created_at'].substring(0,10);
            //    rows[i]['updated_at'] = !rows[i]['updated_at'] || rows[i]['updated_at'].length <= 10 || rows[i]['updated_at'].substring(0,10);
            //    rows[i]['deleted_at'] = !rows[i]['deleted_at'] || rows[i]['deleted_at'].length <= 10 || rows[i]['deleted_at'].substring(0,10);
            //}
            //

            //for(var i=0;i<rows.length;i++){
            //    rows[i]['operation'] =
            //}

            //res['rows'] = rows;

            return res;
        },

        onCheck:function(rowData, $ele){

        }

    });

    $('#bst-search').on('click',function(){
        var params = {search: $('#bst-toolbar input[name=search]').val()};
        $bst_table.bootstrapTable('refresh',{query: params});
    });


    $bst_table.on('click', 'a.category-del', function () {
        var id = $(this).attr('data-category-id');
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
                    url: '/backend/category/' + id,
                    data:{},
                    success:function(data){
                        $bst_table.bootstrapTable('refresh');
                    }
                });

            } else {
                //toastr.error('取消删除 !');
            }
        });
    });

    $('#category-save').on('click', function () {
        var send = {
            name: $('#category-name').val(),
            desc: $('#category-desc').val()
        };
        $.helpers.store({
            url: '/backend/category',
            data: send,
            success: function (data) {
                $bst_table.bootstrapTable('refresh');
            }
        });
    });



});


