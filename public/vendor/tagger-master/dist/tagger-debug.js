/**
 * Created by Gavin on 16/6/2.
 */
+function ($) {
    'use strict';

    var Tagger = function (element, options) {
        this.$element = $(element); // input element
        this.$container = $(options.container);
        this.namespace = 'tagger';
        this.options = options;
        this.tags = options.tags;
        this.lastInputValue = null;

        this.init();
    };

    Tagger.DEFAULTS = {
        container: '#tag-container',
        divide: true, // string boolean
        color: 'random',
        tags: []
    };

    Tagger.prototype.init = function () {
        var that = this;
        this.tags.forEach(function (curValue) {
            that.createElement(curValue);
        });

        this.$element.on('keydown.' + this.namespace, $.proxy(function (e) {
            (e.which == 13 || e.which == 9) && this.add(e);
        }, this));
    };

    Tagger.prototype.add = function (e) {
        var that = this;

        if (e) e.preventDefault();
        that.lastInputValue = that.$element.val().trim();

        if ((typeof this.options.divide == 'boolean' && this.options.divide !== false) || typeof this.options.divide == 'string') {
            var divide = ' ';
            if (typeof this.options.divide === true) {
                divide = ' ';
            } else if (typeof this.options.divide === 'string') {
                divide = this.options.divide;
            }

            var temp = this.lastInputValue.split(divide);
            temp.forEach(function (curValue) {
                curValue = curValue.trim();
                curValue.length > 0 && this.tags.indexOf(curValue) === -1 && this.tags.push(curValue) && that.createElement(curValue);
            }, that)
        } else {
            curValue.length > 0 && this.tags.indexOf(that.lastInputValue) === -1 && that.createElement(that.lastInputValue);
        }

    };

    Tagger.prototype.createElement = function (input) {
        var that = this;
        var classes = ['tagger-piece-LightPink', 'tagger-piece-conifer', 'tagger-piece-sauce', 'tagger-piece-RedGold', 'tagger-piece-ultramarine', 'tagger-piece-swarthy', 'tagger-piece-ink', 'tagger-piece-amber'];

        var childNode = document.createElement('span');
        $(childNode).addClass('tagger-piece');

        if (typeof this.options.color === 'string') {
            if (this.options.color === 'random') {
                $(childNode).addClass(classes[Math.floor(Math.random() * classes.length + 1) - 1]);
            } else if (classes.indexOf(this.options.color) > -1) {
                $(childNode).addClass(this.options.color);
            } else {
                $(childNode).addClass('tagger-piece-ink');
            }
        } else {
            $(childNode).addClass('tagger-piece-ink');
        }

        childNode.appendChild(document.createTextNode(input));

        var childNode_a = document.createElement('a');
        childNode_a.className = 'remove';
        childNode_a.appendChild(document.createTextNode('x'));

        $(childNode_a).on('click.' + this.namespace, null, {input: input}, function (e) {
            if (e) e.preventDefault();
            that.remove(e, childNode);
        });

        childNode.appendChild(childNode_a);

        this.$container.append(childNode);
        this.$element.val('');
    };

    Tagger.prototype.remove = function (e, delElement) {
        this.tags.indexOf(e.data.input) > -1
        && this.tags.splice(this.tags.indexOf(e.data.input), 1)
        && $(delElement).fadeOut(300, function () {
            $(delElement).remove()
        })
        && this.$element.trigger('tagger.remove', []);
    };

    Tagger.prototype.destroy = function () {
        //that.$element.off('.' + that.type).removeData('bs.' + that.type)
    };


    Tagger.prototype.getTags = function () {
        return this.tags;
    };

    Tagger.prototype.addTag = function () {
        this.add();
    };


    function Plugin(option) {
        var fun = ['getTags', 'addTag'];
        if (typeof option == 'string' && fun.indexOf(option) > -1) {
            var data = this.data('tagger');
            return data[option]();
        }

        return this.each(function () {
            var $this = $(this);
            var data = $this.data('tagger');
            var options = $.extend({}, Tagger.DEFAULTS, $this.data(), typeof option == 'object' && option);

            if (!data) $this.data('tagger', (data = new Tagger(this, options)));
            if (typeof option == 'string') data[option]();
        });
    }


    var old = $.fn.tag;

    $.fn.tagger = Plugin; // 初始化插件
    $.fn.tagger.Constructor = Tagger; // 构造方法,修改默认参数

    // 解决冲突
    $.fn.tagger.noConflict = function () {
        $.fn.tagger = old;
        return this;
    };


    var clickHandler = function (e) {
        alert(1);
    };

    //$(document).on('click.tag','[data-event-test]',clickHandler);

}(jQuery);