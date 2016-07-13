/**
 * jquery的扩展与配置,适应laravel框架,为本博客服务.
 * Created by Gavin on 16/2/4.
 */

define(function (require, exports, module) {
    "use strict";

    var $ = require('jquery');

    var toastr = require('toastr');
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "500",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "1500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // 设置帮助类命名空间
    $.helpers = {};

    $.helpers.isIE    = (navigator.appName == "Microsoft Internet Explorer");
    $.helpers.isIE8   = ($.helpers.isIE && navigator.appVersion.match(/8./i) == "8.");


    /**
     * 设置ajax默认参数
     * X-CSRF-TOKEN    Laravel CSRF(跨网站请求伪造)保护
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /**
     * 发送ajax请求,用于本博客的新增保存操作
     * @param accept
     */
    $.helpers.store = function(accept){
        $.ajax({
            url:accept.url,
            method:'post',
            data: $.isEmptyObject(accept.data) ? {} : accept.data,
            dataType: accept.dataType ? accept.dataType : 'json',
            success:function(data){
                data.code === 0 && toastr.success('已新增') && $.isFunction(accept.success) && accept.success(data);
                data.code !== 0 && toastr.error(data.desc) && $.isFunction(accept.error) && accept.error(data);
            },
            error:function(data){
                console.debug(data);
            }
        });
    };


    /**
     * 发送ajax请求,用于本博客的更新操作
     * @param accept
     */
    $.helpers.update = function(accept){
        $.ajax({
            url:accept.url,
            method:'put',
            data:$.isEmptyObject(accept.data) ? {} : accept.data,
            dataType: accept.dataType ? accept.dataType : 'json',
            success:function(data){
                data.code === 0 && toastr.success('已更新') && $.isFunction(accept.success) && accept.success(data);
                data.code !== 0 && toastr.error(data.desc) && $.isFunction(accept.error) && accept.error(data);
            },
            error:function(data){
                console.debug(data);
            }
        });
    };

    /**
     * 发送ajax请求,用于本博客的删除操作
     * @param accept
     */
    $.helpers.destroy = function(accept){
        $.ajax({
            url:accept.url,
            method:'delete',
            data:$.isEmptyObject(accept.data) ? {} : accept.data,
            dataType: accept.dataType ? accept.dataType : 'json',
            success:function(data){
                data.code === 0 && toastr.success('已删除') && $.isFunction(accept.success) && accept.success(data);
                data.code !== 0 && toastr.error(data.desc) && $.isFunction(accept.error) && accept.error(data);
            },
            error:function(data){
                console.debug(data);
            }
        });
    };


    /**
     * 类似于php中的in_array,一个字符串或数字是否在数组中出现
     *
     * @param search
     * @param array
     * @returns {boolean}
     */
    $.helpers.in_array = function(search,array){
        for(var i in array){
            if(array[i]==search){
                return true;
            }
        }
        return false;
    };


    /**
     * 获取表单的输入框值
     *
     * @param ele  表单element
     * @returns 一个对象{k:v,k:v}
     */
    $.helpers.getFormParams = function(ele){
        var names=$(ele).find("input");
        var params={},type="";
        for(var i=0;i<names.length;i++){
            type = names[i].type.toLowerCase();
            if(this.in_array(type,["password","email","text"])){
                params[names[i].name] = names[i].value;
            }else if(this.in_array(type,["checkbox"])){
                params[names[i].name] = $(names[i]).is('input:checkbox:checked')?'1':'0';
            }
        }
        return params;
    };


    /**
     * 序列化一个表单,返回一个对象,类似json格式
     * @returns {{}}
     */
    $.fn.serializeJson = function(){
        var serializeObj = {};
        var array = this.serializeArray();
        $(array).each(function(){
            if(serializeObj[this.name]){
                if($.isArray(serializeObj[this.name])){
                    serializeObj[this.name].push(this.value);
                }else{
                    serializeObj[this.name]=[serializeObj[this.name],this.value];
                }
            }else{
                serializeObj[this.name]=this.value;
            }
        });
        return serializeObj;
    };

    /**
     * 使选定元素具有返回页面顶端的能力
     * @param options
     */
    $.helpers.backToTop = function(options){
        var defaults = {
            clickEle:'.back-to-top',
            scrollEle:'html,body',
            min_height:600,
            scrollSpeed:600
        };

        $.extend(true,defaults,options);

        $(window).scroll(function(){
            if( $(window).scrollTop() > defaults.min_height){
                $(defaults.clickEle).fadeIn(500);
            }else{
                $(defaults.clickEle).fadeOut(500);
            }
        });

        $(defaults.clickEle).click(
            function(){$(defaults.scrollEle).animate({scrollTop:0},defaults.scrollSpeed);
        });

    };

    /**
     * 异步加载js
     * @param filePath 文件路径
     * @param callback 回调函数
     * @param into 放进head中或者body
     */
    $.helpers.loadScript = function(filePath, callback, into) {
        into          = into     || "head";
        callback      = callback || function() {};

        var script    = null;
        script        = document.createElement("script");
        script.id     = filePath.replace(/[\./]+/g, "-");
        script.type   = "text/javascript";
        script.src    = filePath;

        if ($.helpers.isIE8) {
            script.onreadystatechange = function() {
                if(script.readyState) {
                    if (script.readyState === "loaded" || script.readyState === "complete") {
                        script.onreadystatechange = null;
                        callback();
                    }
                }
            };
        } else {
            script.onload = function() {
                callback();
            };
        }

        if(document.getElementById(script.id)){
            callback();
        } else {
            if (into === "head") {
                document.getElementsByTagName("head")[0].appendChild(script);
            } else {
                document.body.appendChild(script);
            }
        }

    };

    $.fn.timeOutEnd = function (fun,time) {
        window.setTimeout(fun,time);

        return this;
    };

    return $;
});