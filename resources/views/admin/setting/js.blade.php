
<script type="text/javascript">
	$(document).ready(function(){
	    //INSERT DATA AND UPDATE DATA
	   
		 $('#upload_form').on('submit', function(event){
			  event.preventDefault();
			  $.ajax({
			   url:"/admin/{{$folder}}/update",
			   method:"POST",
			   data:new FormData(this),
			   //dataType:'JSON',
			   contentType: false,
			   cache: false,
			   processData: false,
			   beforeSend: function() {
					$("#postdataload").html('<div id="page-loader" class="fade show"><span class="spinner"></span></div>');
        		},       
				success: function(data){
					swal("แก้ไชข้อมูลนี้เรียบร้อยแล้ว", {icon: "success",});

				},
				complete : function(data){	
					$("#postdataload").hide();
				},
			  })
 		});





	function readURL(input,idput) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
		             document.getElementById(idput).innerHTML = '<div  style="position: absolute;  z-index: 5; left: 0px; top: 0px; width:100%; height:100%; background:url('+e.target.result+'); background-size:cover; background-position:center;"></div>';	
		             document.getElementById("cover-thumb").style.display = "none";             
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
		$("#image").change(function(){
	        readURL(this,'img-thumb');
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