/**
 *  jQuery-Sidebar.js
 *  Version: 1.0.0
 *  http://github.com/gavin66/jquery-sidebar
 */


;
(function(factory) {
    "use strict";

    // CommonJS/Node.js
    if (typeof require === "function" && typeof exports === "object" && typeof module === "object")
    {
        module.exports = factory;
    }
    else if (typeof define === "function")  // AMD/CMD/Sea.js
    {
        if (define.amd) // for Require.js
        {
            /* Require.js define replace */
        }
        else
        {
            define(["jquery"], factory);  // for Sea.js
        }
    }
    else
    {
        factory();
    }

}(function () {
    "use strict";

    $.jqSidebar = function (options) {

        /**
         * ==================
         *       插件参数
         * ==================
         */

        var setting = $.extend({
            // sidebar-turn container-offset sidebar-offset
            leftMode: 'container-offset', // 左侧边栏的切换方式
            rightMode: 'container-offset', // 右侧边栏的切换方式
            leftTurnShow: 'jqsb-left-bg', // 左侧导航栏为左右交替变换时默认显示的元素
            rightTurnShow: 'jqsb-right-bg', // 右侧导航栏为左右交替变换时默认显示的元素
            sideActive:'', // 哪边为激活状态 可为'left','right' 默认为空
            autoClose: true // 点击container 是否自动关闭两侧导航栏
        }, options);


        /**
         * =====================
         *       定义插件变量
         * =====================
         */

        // 左右两侧侧边栏是否是激活状态 初始化为false 不是激活状态
        var leftActive = setting.sideActive === 'left' ? 1 : 0;
        var rightActive = setting.sideActive === 'right' ? 1 : 0;
        var leftBgActive = false;
        var rightBgActive = false;
        var leftSmActive = false;
        var rightSmActive = false;

        // 获取中间内容的容器
        if ($('.jqsb-container').length) {
            var $container = $('.jqsb-container');
        }
        // 获取左侧边栏
        if ($('.jqsb-left').length) {
            var $left = $('.jqsb-left');
            var left_width_unit = $left.css('width');
        }
        // 如果左侧边栏是大小切换方式的 获取小的块
        if ($('.jqsb-left-sm').length) {
            var $left_sm = $('.jqsb-left-sm');
            var left_sm_width = $left_sm.width();
            var left_sm_width_unit = $left_sm.css('width');
        }
        // 如果左侧边栏是大小切换方式的 获取大的块
        if ($('.jqsb-left-bg').length) {
            var $left_bg = $('.jqsb-left-bg');
            var left_bg_width = $left_bg.width();
            var left_bg_width_unit = $left_bg.css('width');
        }
        // 获取右侧边栏
        if ($('.jqsb-right').length) {
            var $right = $('.jqsb-right');
            var right_width_unit = $right.css('width');
        }
        // 如果右侧边栏是大小切换方式的 获取小的块
        if ($('.jqsb-right-sm').length) {
            var $right_sm = $('.jqsb-right-sm');
            var right_sm_width = $right_sm.width();
            var right_sm_width_unit = $right_sm.css('width');
        }
        // 如果右侧边栏是大小切换方式的 获取大的块
        if ($('.jqsb-right-bg').length) {
            var $right_bg = $('.jqsb-right-bg');
            var right_bg_width = $right_bg.width();
            var right_bg_width_unit = $right_bg.css('width');
        }


        /**
         * ==================
         *       操作
         * ==================
         */

        // 开关
        function toggle(side) {
            if (side === 'left' && $left) {
                if (leftActive && $left_bg && $left_sm) {
                    if (leftBgActive) {
                        close('left');
                    } else if (leftSmActive) {
                        open('left');
                    }
                } else {
                    if (!leftActive) {
                        open('left');

                    } else {
                        close('left');
                    }
                }
            }
            if (side === 'right' && $right) {
                if (rightActive && $right_bg && $right_sm) {
                    if (rightBgActive) {
                        close('right');
                    } else if (rightSmActive) {
                        open('right');
                    }
                } else {
                    if (!rightActive) {
                        open('right');
                    } else {
                        close('right');
                    }
                }
            }

        }

        // 打开
        function open(side) {
            var time = 1;
            if($left && side === 'left'){
                if(setting.rightMode !== 'sidebar-turn'){
                    if(rightActive) time = 400;
                    close('right'); // 开左侧,先关闭右侧
                }
                if(leftSmActive){
                    animate('turn', [$left_sm, $left_bg], 'left', left_bg_width, function () {
                        leftBgActive = true;
                        leftSmActive = false;
                    });
                }else if(setting.leftMode === 'container-offset'){
                    setTimeout(function(){
                        animate('offset', [$container], '', left_width_unit, function () {
                            leftActive = true;
                        });
                    },time);
                }else if(setting.leftMode === 'sidebar-offset'){
                    setTimeout(function(){
                        animate('offset', [$left], '', left_width_unit, function () {
                            leftActive = true;
                        });
                    },time);
                }
            }
            if($right && side === 'right'){
                if(setting.leftMode !== 'sidebar-turn'){
                    if(leftActive) time = 400;
                    close('left'); // 开左侧,先关闭右侧
                }
                if(rightSmActive){
                    animate('turn', [$right_sm, $right_bg], 'right', right_bg_width, function () {
                        rightBgActive = true;
                        rightSmActive = false;
                    });
                }else if(setting.rightMode === 'container-offset'){
                    setTimeout(function(){
                        animate('offset', [$container], '', '-'+right_width_unit, function () {
                            rightActive = true;
                        });
                    },time);
                }else if(setting.rightMode === 'sidebar-offset'){
                    setTimeout(function(){
                        animate('offset', [$right], '', '-'+right_width_unit, function () {
                            rightActive = true;
                        });
                    },time);
                }
            }

        }

        // 关闭
        function close(side) {
            if($left && side === 'left'){
                if(leftBgActive){
                    animate('turn', [$left_bg, $left_sm], 'left', left_sm_width, function () {
                        leftBgActive = false;
                        leftSmActive = true;
                    });
                }else if(setting.leftMode === 'container-offset'){
                    animate('offset', [$container], '', '0px', function () {
                        leftActive = false;
                    });
                }else if(setting.leftMode === 'sidebar-offset'){
                    animate('offset', [$left], '', '0px', function () {
                        leftActive = false;
                    });
                }
            }
            if($right && side === 'right'){
                if(rightBgActive){
                    animate('turn', [$right_bg, $right_sm], 'right', right_sm_width, function () {
                        rightBgActive = false;
                        rightSmActive = true;
                    });
                }else if(setting.rightMode === 'container-offset'){
                    animate('offset', [$container], '', '0px', function () {
                        rightActive = false;
                    });
                }else if(setting.rightMode === 'sidebar-offset'){
                    animate('offset', [$right], '', '0px', function () {
                        rightActive = false;
                    });
                }
            }
        }

        // 动画
        function animate(mode, selectors,position,amount, callback) {
            // 动画类型是大小切换的
            if (mode === 'turn') {
                if(position === 'left'){
                    selectors[0].stop().fadeOut(200, function () {
                        $container.dequeue().animate({marginLeft: amount}, 300);
                        $left.stop().animate({width: amount}, 300, function () {
                            selectors[1].stop().fadeIn(200, function () {
                                callback();
                            });
                        });
                    });
                }else if(position === 'right'){
                    selectors[0].stop().fadeOut(200, function () {
                        $container.dequeue().animate({marginRight: amount}, 300);
                        $right.stop().animate({width: amount}, 300, function () {
                            selectors[1].stop().fadeIn(200, function () {
                                callback();
                            });
                        });
                    });
                }

            } else if (mode === 'offset') {
                selectors[0].css('transform', 'translate( ' + amount + ' )');
                callback();
            }
        }

        /**
         * ==================
         *      事件
         * ==================
         */

        // 事件处理 防止冒泡和默认事件
        function eventHandler(event, selector) {
            event.stopPropagation();
            event.preventDefault();
        }

        // 左侧导航栏开关
        $('.jqsb-toggle-left').on('click', function (event) {
            eventHandler(event, $(this));
            toggle('left');

        });

        // 右侧导航栏开关
        $('.jqsb-toggle-right').on('click', function (event) {
            eventHandler(event, $(this));
            toggle('right');
        });

        // 点击jqsb-container的内容 关闭两侧侧边栏
        $container.on('click', function (event) {
            if (setting.autoClose && ($left || $right) && (leftActive || rightActive)) {
                eventHandler(event, $(this));
                close('left');
                close('right');
            }
        });


        /**
         * ==================
         *       接口
         * ==================
         */

        this.toggle = toggle;
        this.close = close;
        this.open = open;
        this.destroy = function(side){
            if(side === 'left' && $left){
                if(leftActive) close('left');
                setTimeout(function(){
                    $left.remove();
                    $left = false;
                },400);
            }
            if(side === 'right' && $right){
                if(rightActive) close('right');
                setTimeout(function(){
                    $right.remove();
                    $right = false;
                },400);
            }
        };

        // 初始化插件
        (function init() {
            if($container){
                // 左侧边栏
                if($left){
                    if(setting.leftMode === 'sidebar-turn' && $left_bg && $left_sm){// 如果切换模式为大小交替隐藏模式
                        leftActive = true;
                        if (setting.leftTurnShow === 'jqsb-left-bg') { // 默认显示大的话,隐藏小的  反之,亦然
                            $container.css('marginLeft', left_bg_width_unit);// 初始 $container 内容容器的左外补 margin-left
                            $left.width(left_bg_width_unit);
                            $left_sm.hide();
                            leftBgActive = true;
                        } else {
                            $container.css('marginLeft', left_sm_width_unit);// 初始 $container 内容容器的左外补 margin-left
                            $left.width(left_sm_width_unit);
                            $left_bg.hide();
                            leftSmActive = true;
                        }
                    }else if(setting.leftMode === 'container-offset' && leftActive){
                        open('left');
                    }else if(setting.leftMode === 'sidebar-offset'){ // 如果切换模式为侧边栏滑动
                        $left.css('marginLeft','-'+left_width_unit).addClass('sidebar-mode');
                        if(leftActive) open('left');
                    }
                }
                // 右侧边栏
                if($right){
                    if(setting.rightMode === 'sidebar-turn' && $right_bg && $right_sm){// 如果切换模式为大小交替隐藏模式
                        rightActive = true;
                        if (setting.rightTurnShow === 'jqsb-right-bg') { // 默认显示大的话,隐藏小的  反之,亦然
                            $container.css('marginRight', right_bg_width_unit);// 初始 $container 内容容器的左外补 margin-left
                            $right.width(right_bg_width_unit);
                            $right_sm.hide();
                            rightBgActive = true;
                        } else {
                            $container.css('marginRight', right_sm_width_unit);// 初始 $container 内容容器的左外补 margin-left
                            $right.width(right_sm_width_unit);
                            $right_bg.hide();
                            rightSmActive = true;
                        }
                    }else if(setting.rightMode === 'container-offset' && rightActive){
                        open('right');
                    }else if(setting.rightMode === 'sidebar-offset'){ // 如果切换模式为侧边栏滑动
                        $right.css('marginRight','-'+right_width_unit).addClass('sidebar-mode');
                        if(rightActive) open('right');
                    }
                }
            }
        })();

    };
}));