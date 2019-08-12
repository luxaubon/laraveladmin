<?php
$config=array(
	"basePath"=>"ckeditor", //  กำหนด path ของ ckeditor
	"skin"=>"kama", // kama | office2003 | v2
	"language"=>"en", // th / en and more.....
	"extraPlugins"=>"uicolor", // เรียกใช้ plugin ให้สามารถแสดง UIColor Toolbar ได้
	"uiColor"=>"#92C2C1", // กำหนดสีของ ckeditor
	"extraPlugins"=>"autogrow", // เรียกใช้ plugin ให้สามารถขยายขนาดความสูงตามเนื้อหาข้อมูล
	"autoGrow_maxHeight"=>700, // กำหนดความสูงตามเนื้อหาสูงสุด ถ้าเนื้อหาสูงกว่า จะแสดง scrollbar
	"enterMode"=>2, // กดปุ่ม Enter -- 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	"shiftEnterMode"=>1, // กดปุ่ม Shift กับ Enter พร้อมกัน 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	"height"=>200, // กำหนดความสูง
	"width"=>800,  // กำหนดความกว้าง * การกำหนดความกว้างต้องให้เหมาะสมกับจำนวนของ Toolbar
    "fullPage"=>false, // กำหนดให้สามารถแก้ไขแบบเโค้ดเต็ม คือมีแท็กตั้งแต่ <html> ถึง </html>
	"filebrowserBrowseUrl"=>$part_host_admin."ckeditor/filemanager/browser/default/browser.html?Connector=".urlencode("../../connectors/php/connector.php"),
	"filebrowserImageBrowseUrl"=>$part_host_admin."ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=".urlencode("../../connectors/php/connector.php"),
	"filebrowserFlashBrowseUrl"=>$part_host_admin."ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=".urlencode("../../connectors/php/connector.php"),
	"filebrowserUploadUrl"=>$part_host_admin."ckeditor/filemanager/connectors/php/upload.php",
	"filebrowserImageUploadUrl"=>$part_host_admin."ckeditor/filemanager/connectors/php/upload.php?Type=Image",
	"filebrowserFlashUploadUrl"=>$part_host_admin."ckeditor/filemanager/connectors/php/upload.phpType=Flash",
	"toolbar"=>array(
		array('Source','-','Templates'),
		array('Bold','Italic','Underline','Strike','-','Subscript','Superscript'),
		array('NumberedList','BulletedList','-','Outdent','Indent','Blockquote'),
		array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
		array('Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','UIColor')
	)
);
?>