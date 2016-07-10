/**
 * Created by Gavin on 16/6/2.
 */
+function ($) {
    'use strict';

    var TAGGER_DROPDOWN_TOGGLE = '[data-tagger-toggle="dropdown"]';

    var Tagger = function (element, options) {
        this.$element = $(element); // input element
        this.$container = $(options.container);
        this.options = options;
        this.tags = options.tags;
        this.lastInputValue = null;
        this.init();
    };

    Tagger.DEFAULTS = {
        container: '#tag-container',
        divide: true, // string boolean
        color: 'random',
        tags: [],
        dropdown: false
    };

    Tagger.prototype.init = function () {
        var that = this;
        this.tags.forEach(function (curValue) {
            that.createElement(curValue);
        });

        this.$element.on('keydown.tagger.enter', $.proxy(function (e) {
            (e.which == 13 || e.which == 9) && this.add(e);
        }, this));


        if(this.options.dropdown.items){
            this.createDropdown(this.options.dropdown.items);
        }else if(typeof this.options.dropdown.load === 'object'){
            var that = this;
            var params_success = {
                success: function(data) {
                    that.createDropdown(that.options.dropdown.load.success(data));
                }
            };
            var prams = $.extend({}, that.options.dropdown.load, params_success);

            $.ajax(prams);
        }

    };

    Tagger.prototype.add = function (e,inputValue) {
        var that = this;

        if (e) e.preventDefault();
        typeof inputValue == 'string' ? that.lastInputValue = inputValue : that.lastInputValue = that.$element.val().trim();

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
                curValue.length === 0 && this.$element.val(''); this.tags.indexOf(curValue) !== -1 && this.$element.val('');
                curValue.length > 0 && this.tags.indexOf(curValue) === -1 && this.tags.push(curValue) && that.createElement(curValue);
            }, that)
        } else {
            curValue.length === 0 && this.$element.val(''); this.tags.indexOf(curValue) !== -1 && this.$element.val('');
            curValue.length > 0 && this.tags.indexOf(that.lastInputValue) === -1 && that.createElement(that.lastInputValue);
        }

    };

    Tagger.prototype.createElement = function (input) {
        var that = this;
        var classes = ['tagger-piece-LightPink', 'tagger-piece-conifer', 'tagger-piece-sauce', 'tagger-piece-RedGold', 'tagger-piece-ultramarine', 'tagger-piece-swarthy', 'tagger-piece-ink', 'tagger-piece-amber'];

        var childNode = document.createElement('span');
        var $childNode = $(childNode);
        $childNode.addClass('tagger-piece');

        if (typeof this.options.color === 'string') {
            if (this.options.color === 'random') {
                $childNode.addClass(classes[Math.floor(Math.random() * classes.length + 1) - 1]);
            } else if (classes.indexOf(this.options.color) > -1) {
                $childNode.addClass(this.options.color);
            } else {
                $childNode.addClass('tagger-piece-ink');
            }
        } else {
            $childNode.addClass('tagger-piece-ink');
        }

        childNode.appendChild(document.createTextNode(input));

        var childNode_a = document.createElement('a');
        childNode_a.className = 'remove';
        childNode_a.appendChild(document.createTextNode('x'));

        $(childNode_a).on('click.tagger.remove', null, {input: input}, function (e) {
            if (e) e.preventDefault();
            that.remove(e, childNode);
        });

        childNode.appendChild(childNode_a);

        this.$container.append(childNode);
        this.$element.val('');
        this.dropdownClear();
    };

    Tagger.prototype.remove = function (e, delElement) {
        this.tags.indexOf(e.data.input) > -1
        && this.tags.splice(this.tags.indexOf(e.data.input), 1)
        && $(delElement).fadeOut(300, function () {
            $(delElement).remove()
        })
        && this.$element.trigger('tagger.remove', []);
    };

    Tagger.prototype.createDropdown = function (items) {
        var that = this;
        var node = document.createElement('ul');
        var $node = $(node);
        $node.addClass('tagger-dropdown-menu');

        var li = null;var a = null;var text = null;
        for (var index in items) {
            li = document.createElement('li');

            a = document.createElement('a');
            a.href = 'javascript:void(0)';
            a.setAttribute('data-value',items[index]);

            text = document.createTextNode(items[index]);

            a.appendChild(text);
            li.appendChild(a);
            node.appendChild(li);
        }

        var $tagger = this.$element.parent('.tagger-box');

        if($tagger.length){
            this.$element.attr({
                'data-tagger-toggle':'dropdown',
                'aria-haspopup':'true',
                'aria-expanded': false
            });
            $tagger.append(node);
            $($tagger).on('click.tagger.dropdown','ul.tagger-dropdown-menu li>a',function(e){
                that.add(e,$(this).attr('data-value'));
            });
        }

    };

    Tagger.prototype.dropdownToggle = function(e){
        var $this = $(this);

        if ($this.is('.disabled, :disabled')) return;

        var $parent  = $this.parent('.tagger-box');
        var isActive = $parent.hasClass('open');

        Tagger.prototype.dropdownClear(e);

        if (!isActive) {
            //if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
            //    // if mobile we use a backdrop because click events don't delegate
            //    $(document.createElement('div'))
            //        .addClass('dropdown-backdrop')
            //        .insertAfter($(this))
            //        .on('click', clearMenus)
            //}

            var relatedTarget = { relatedTarget: this };
            $parent.trigger(e = $.Event('show.tagger.dropdown', relatedTarget));

            if (e.isDefaultPrevented()) return;

            $this.trigger('focus').attr('aria-expanded', 'true');

            $parent.toggleClass('open').trigger($.Event('shown.tagger.dropdown', relatedTarget));
        }

        return false;
    };

    Tagger.prototype.dropdownClear =  function(e){
        $(TAGGER_DROPDOWN_TOGGLE).each(function () {
            var $this         = $(this);
            var $parent       = $this.parent('.tagger-box');

            var relatedTarget = { relatedTarget: this };

            if (!$parent.hasClass('open')) return;

            if (e && e.type == 'click' && /input|textarea/i.test(e.target.tagName) && $.contains($parent[0], e.target)) return;

            $parent.trigger(e = $.Event('hide.tagger.dropdown', relatedTarget));

            if (e.isDefaultPrevented()) return;

            $this.attr('aria-expanded', 'false');
            $parent.removeClass('open').trigger($.Event('hidden.bs.dropdown', relatedTarget));
        });
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


    $(document)
        .on('click.tagger.dropdown',Tagger.prototype.dropdownClear)
        .on('click.tagger.dropdown',TAGGER_DROPDOWN_TOGGLE,Tagger.prototype.dropdownToggle);

}(jQuery);