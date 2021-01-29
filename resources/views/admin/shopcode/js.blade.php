{{-- <script src = "{{ URL::to('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
var editor_config = {
    path_absolute : "{{ URL::to('/') }}/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script> --}}

<script type="text/javascript">
	$(document).ready(function(){
		var editID = $('#editID').val();
		$('.image-link').magnificPopup({type:'image'});
		
		//swal('ลบข้อมูล','การลบข้อมูลเรียบร้อย','success');

		// Delete IMAGE GALLERY
	   $("a[id^='del_img']").click(function(){
			var numrow = $(this).attr("id");
			numrow = numrow.substr(7);
			var params = {
			  	numrow : numrow,
			  	id : editID
			  }
			swal({
					title: 'คุณแน่ใจที่จะทำการลบข้อมูลนี้?',
					text: 'เมื่อทำการลบข้อมูลนี้ จะไม่สามารถกู้กลับมาได้!',
					icon: 'error',
					buttons: {
						cancel : {
							text: 'ยกเลิก',
							value: null,
							visible: true,
							className: 'btn btn-default',
							closeModal: true,
						},
						confirm : {
							text: 'ทำการลบ',
							value: true,
							visible: true,
							className: 'btn btn-danger',
							closeModal: true
						}
					}
				}).then((willDelete) => {
					  if (willDelete) {
					  	
					  	$.ajax({
							type : "GET",
							url: "/admin/{{$folder}}/del_img",
							data : params,
							beforeSend : function(data){
								$("#"+numrow).hide();
								swal("ทำการลบข้อมูลนี้เรียบร้อยแล้ว", {icon: "success",});
								
							},
						 	complete : function(){
							 	//window.location.assign('');
							}
							});
							
					  }
				});
		});// Delete IMAGE

	   // Delete LIST DATA

	  $("a[id^='content_del']").click(function(){
			var numrow = $(this).attr("id");
			numrow = numrow.substr(11);
			var params = {
			  	numrow : numrow,
			  }
			swal({
					title: 'คุณแน่ใจที่จะทำการลบข้อมูลนี้?',
					text: 'เมื่อทำการลบข้อมูลนี้ จะไม่สามารถกู้กลับมาได้!',
					icon: 'error',
					buttons: {
						cancel : {
							text: 'ยกเลิก',
							value: null,
							visible: true,
							className: 'btn btn-default',
							closeModal: true,
						},
						confirm : {
							text: 'ทำการลบ',
							value: true,
							visible: true,
							className: 'btn btn-danger',
							closeModal: true
						}
					}
				}).then((willDelete) => {
					  if (willDelete) {
					  	$.ajax({
							type : "GET",
							url: "/admin/{{$folder}}/del_content",
							data : params,
							beforeSend : function(data){
								$("#content"+numrow).hide();
								swal("ทำการลบข้อมูลนี้เรียบร้อยแล้ว", {icon: "success",});
								
							},
						 	complete : function(){
							 	//window.location.assign('');
							}
							});
					  }
				});
		});// Delete CONTENT

		
		if(editID != ''){
			$(function() { //- Move Images Gallery
				position_updated = false; //helper flag for sortable below
				$("#sortable").sortable({
					connectWith: "#sortable",        
					update: function(event, ui) {
						position_updated = !ui.sender; //if no sender, set sortWithin flag to true
					},
					stop: function(event, ui) {	           
					if (position_updated) {
					  var params = {
					  	x : ui.item.attr("id"),
					  	y : ui.item.index(),
					  	id : editID
					  }
					  $.ajax({
						  type: "GET",
						  url: "/admin/{{$folder}}/update_listpic",
						  data: params,
						success: function(data){
							//alert(data)
						}
						}); 
							position_updated = false;
						}
					}
				}).disableSelection(); 
			});
		}


	// COVER IMAGE//Read Fine Cover Data Thumb
		    function readURL(input,idput) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function (e) {
			             document.getElementById(idput).innerHTML = '<div id="Showimage" style="position: absolute;  z-index: 5; left: 0px; top: 0px; width:100%; height:100%; background:url('+e.target.result+'); background-size:cover; background-position:center;"></div>';	
			             document.getElementById("cover-thumb").style.display = "none";             
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
			$("#image").change(function(){
		        readURL(this,'img-thumb');
		    });
		
	    function readURLCover(input,idput,idputsec,idcoverfacebook) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
		            document.getElementById(idput).innerHTML = '<img id="Showimageslide" src="'+e.target.result+'" width="100%">';
		            /*document.getElementById(idputsec).innerHTML = '<div  style="position: absolute;  z-index: 4; left: 0px; top: 0px; width:100%; height:100%; background:url('+e.target.result+'); background-size:cover; background-position:center center;"></div>';
		            document.getElementById(idcoverfacebook).innerHTML = '<div  style="position: absolute;  z-index: 4; left: 0px; top: 0px; width:100%; height:100%; background:url('+e.target.result+'); background-size:cover; background-position:center center;"></div>';*/
		            document.getElementById("cover").style.display = "none";
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
		$("#slide").change(function(){
	        readURLCover(this,'img-cover','img-thumb-cover','img-thumb-facebook');
	    });
		
		    function readURLFacebook(input,idput) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function (e) {
			             document.getElementById(idput).innerHTML = '<div id="Showimagefb" style="position: absolute;  z-index: 5; left: 0px; top: 0px; width:100%; height:236px; background:url('+e.target.result+'); background-size:cover; background-position:center center;"></div>';
			             document.getElementById("cover-share").style.display = "none"; 
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		     $("#slidefacebook").change(function(){
		        readURLFacebook(this,'img-facebook');
		    });
			
		 });


		</script>