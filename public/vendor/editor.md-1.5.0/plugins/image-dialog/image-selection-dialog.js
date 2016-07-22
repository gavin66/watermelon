/*!
 * Image (upload) dialog plugin for Editor.md
 *
 * @file        image-dialog.js
 * @author      pandao
 * @version     1.3.4
 * @updateTime  2015-06-09
 * {@link       https://github.com/pandao/editor.md}
 * @license     MIT
 */

(function() {

    var factory = function (exports) {

		var pluginName   = "image-selection-dialog";

		exports.fn.imageSelectionDialog = function() {

            var _this       = this;
            var cm          = this.cm;
            var lang        = this.lang;
            var editor      = this.editor;
            var settings    = this.settings;
            var cursor      = cm.getCursor();
            var selection   = cm.getSelection();
            var imageSelectionLang   = lang.dialog.imageSelection;
            var classPrefix = this.classPrefix;
			var dialogName  = classPrefix + pluginName, dialog;

			cm.focus();


            if (editor.find("." + dialogName).length < 1) {
                var guid   = (new Date).getTime();

                var dialogContent = "<div class=\"" + classPrefix + "form\">" +
                                        "<label>" + imageSelectionLang.url + "</label>" +
                                        "<input type=\"text\" name=\"imagePath\" data-url />" + (function(){
                                            return (settings.imageUpload) ? "<div class=\"" + classPrefix + "file-input\">" +
                                                                            "<button type=\"button\" name=\"" + classPrefix + "selection-image\">" + imageSelectionLang.uploadButton + "</button>"+
                                                                            "</div>" : "";
                                        })() +
                                        "<br/>" +
                                        "<label>" + imageSelectionLang.alt + "</label>" +
                                        "<input type=\"text\" name=\"imageTitle\" value=\"" + selection + "\" data-alt />" +
                                        "<br/>" +
                                        "<label>" + imageSelectionLang.link + "</label>" +
                                        "<input type=\"text\" name=\"imageLink\" value=\"http://\" data-link />" +
                                        "<br/>" +
                                     "</div>";

                //var imageFooterHTML = "<button class=\"" + classPrefix + "btn " + classPrefix + "image-manager-btn\" style=\"float:left;\">" + imageSelectionLang.managerButton + "</button>";

                dialog = this.createDialog({
                    title      : imageSelectionLang.title,
                    width      : (settings.imageUpload) ? 465 : 380,
                    height     : 254,
                    name       : dialogName,
                    content    : dialogContent,
                    mask       : settings.dialogShowMask,
                    drag       : settings.dialogDraggable,
                    lockScreen : settings.dialogLockScreen,
                    maskStyle  : {
                        opacity         : settings.dialogMaskOpacity,
                        backgroundColor : settings.dialogMaskBgColor
                    },
                    buttons : {
                        enter : [lang.buttons.enter, function() {
                            var url  = this.find("[data-url]").val();
                            var alt  = this.find("[data-alt]").val();
                            var link = this.find("[data-link]").val();

                            if (url === "")
                            {
                                alert(imageSelectionLang.imageURLEmpty);
                                return false;
                            }

							var altAttr = (alt !== "") ? " \"" + alt + "\"" : "";
                            var urlAttr = (url !== "") ? " \"" + url + "\"" : "";

                            if (link === "" || link === "http://")
                            {
                                //cm.replaceSelection("![" + alt + "](" + url + altAttr + ")");
                                cm.replaceSelection("<img src="+url+" alt="+altAttr+" title="+altAttr+" width=\"60%\">");
                            }
                            else
                            {
                                //cm.replaceSelection("[![" + alt + "](" + url + altAttr + ")](" + link + altAttr + ")");
                                cm.replaceSelection("[<img src="+url+" alt="+altAttr+" title="+altAttr+" width=\"60%\">](" + link + altAttr + ")");
                            }

                            if (alt === "") {
                                cm.setCursor(cursor.line, cursor.ch + 2);
                            }

                            this.hide().lockScreen(false).hideMask();

                            return false;
                        }],

                        cancel : [lang.buttons.cancel, function() {
                            this.hide().lockScreen(false).hideMask();

                            return false;
                        }]
                    }
                });

                dialog.attr("id", classPrefix + "image-dialog-" + guid);

				if (!settings.imageUpload) {
                    return ;
                }


                var selectionButton = dialog.find("[name=\"" + classPrefix + "selection-image\"]");

                selectionButton.on('click',function(){
                    $.get('/api/getFiles.json',{},function(data){
                        var imageChooseDialogHTMLArray = [];
                        data.forEach(function(val){
                            imageChooseDialogHTMLArray.push("<li class=\"attachment\"><div class=\"attachment-preview\"><div class=\"thumbnail-preview\"><div class=\"centered\"><img src=\""+val['thumbnail_url']+"\" data-url=\""+val['url']+"\" data-title=\""+val['title']+"\" alt=\""+val['title']+"\" ></div></div></div></li>");
                        });

                        _this.showImageChooseDialog(imageChooseDialogHTMLArray,editor.find("." + dialogName).find(".editormd-form"));

                    },'json');
                });

            }

			dialog = editor.find("." + dialogName);
			dialog.find("[type=\"text\"]").val("");
			dialog.find("[type=\"file\"]").val("");
			dialog.find("[data-link]").val("http://");

			this.dialogShowMask(dialog);
			this.dialogLockScreen();
			dialog.show();

		};

	};

	// CommonJS/Node.js
	if (typeof require === "function" && typeof exports === "object" && typeof module === "object")
    {
        module.exports = factory;
    }
	else if (typeof define === "function")  // AMD/CMD/Sea.js
    {
		if (define.amd) { // for Require.js

			define(["editormd"], function(editormd) {
                factory(editormd);
            });

		} else { // for Sea.js
			define(function(require) {
                var editormd = require("./../../editormd-debug");
                factory(editormd);
            });
		}
	}
	else
	{
        factory(window.editormd);
	}

})();
