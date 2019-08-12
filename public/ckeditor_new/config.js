/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = "youtube,autogrow,video"; /* look here */

	//var baseURL='http://10.3.1.2/gmlive_admin/_admin/';
  //var baseURL='http://127.0.0.1/gmlive_admin/_admin/';
  var baseURL='/';


	
	config.toolbar_Full =
	[
    { name: 'document',    items : [ 'Source','Templates' ] },
    { name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
    { name: 'editing',     items : [ 'Find','Replace','-','SelectAll' ] },
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] }, 
   '/',
    { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
    { name: 'links',       items : [ 'Link','Unlink' ] }, 
    { name: 'styles',      items : [ 'Format','FontSize' ] },
    { name: 'colors',      items : [ 'TextColor','BGColor' ] },    
    '/',
    { name: 'tools',       items : [ 'Maximize', 'ShowBlocks'] },
    { name: 'insert',      items : [ 'Image','Table','HorizontalRule','SpecialChar','PageBreak','Youtube','Video'] }
	];
	
	config.skin = 'BootstrapCK-Skin';
	
	CKEDITOR.config.fullPage = false;
	CKEDITOR.config.resize_enabled = true;
	CKEDITOR.config.removePlugins = 'autogrow';

   config.filebrowserBrowseUrl = baseURL+'ckeditor_new/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = baseURL+'ckeditor_new/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = baseURL+'ckeditor_new/kfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = baseURL+'ckeditor_new/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = baseURL+'ckeditor_new/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = baseURL+'ckeditor_new/kcfinder/upload.php?type=flash';
};
