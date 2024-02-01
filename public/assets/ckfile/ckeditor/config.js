/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// CKEDITOR.editorConfig = function (config) {
//    // Define changes to default configuration here. For example:
//    // config.uiColor = '#AADC6E';
//    config.language = 'th';
// };

CKEDITOR.editorConfig = function (config) {
   config.extraPlugins = 'youtube';
   config.language = 'th';
   config.height = '25em';
   config.filebrowserBrowseUrl = '/assets/ckfile/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = '/assets/ckfile/ckfinder/ckfinder.html?type=Images';
   config.filebrowserFlashBrowseUrl = '/assets/ckfile/ckfinder/ckfinder.html?type=Flash';
   config.filebrowserUploadUrl = '/assets/ckfile/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/userfile/';
   config.filebrowserImageUploadUrl = '/assets/ckfile/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/userfile/';
   config.filebrowserFlashUploadUrl = '/assets/ckfile/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
   config.enterMode = CKEDITOR.ENTER_BR;
   config.shiftEnterMode = CKEDITOR.ENTER_P;
}