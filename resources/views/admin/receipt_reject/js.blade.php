<script type="text/javascript">

	function showProvince(val){
        if(val !== ''){
            $.ajax({
                url: "/shop_name",
                method: "POST",
                data: {"_token": "{{ csrf_token() }}","val":val,},
                success: function(data){
                    if(data.status == 'success'){
                        $("#show_shop_name").html(data.data);
                    }else{
                        swal("กรุณาเลือกจังหวัด ใหม่อีกครั้ง", "", "error");
                    }
                }
            })
        }else{
            swal("กรุณาเลือกจังหวัด ใหม่อีกครั้ง", "", "error"); 
        }
    }

	$(document).ready(function(){
		var editID = $('#editID').val();
		$('.image-link').magnificPopup({type:'image'});
		
		if($("#status_shop").val() == 'company'){
			$("#allRegion").hide();
			$("#showShopname").show();

			$("#region").val('');
			$("#province").val('');
			$("#region_id_dealer").val('');

		}else{
			$("#region_id_company").val('');

			$("#allRegion").show();
			$("#showShopname").hide();
		}
		$('#status_shop').on('change', function() {
            var status_shop = this.value;
			$("#receipt_point").val('');
			$("#receipt_price").val('');

			if(status_shop == 'dealer'){
				$("#allRegion").show();
				$("#showShopname").hide();

				$("#region_id_company").val('');
			}else if(status_shop == 'company'){
				$("#allRegion").hide();
				$("#showShopname").show();

				$("#region").val('');
				$("#province").val('');
				$("#region_id_dealer").val('');

			}
        });

		

		$('#receipt_price').keyup(function() {
			var price = this.value;
			var status_shop = $("#status_shop").val();
			if(status_shop == 'dealer'){
				var ans = Math.floor(Math.round(price) / 99);
				$("#receipt_point").val(ans);
			}else if(status_shop == 'company'){
				var ans = Math.floor(Math.round(price) / 159);
				$("#receipt_point").val(ans);
			}
		});

		$("a[id^='content_del']").click(function(){
			var numrow = $(this).attr("id");
			numrow = numrow.substr(11);
			$("#myid").val(numrow);
			$('#modal-dialog').modal('toggle');
		});// Delete CONTENT
		
		$("#btnSendReject").click(function(){
			var rejectText = $("#rejectText").val();
			var numrow = $("#myid").val();
			if(rejectText === ''){
				alert('โปรกรอกข้อความในการ Reject');
				return false;
			}else{
				var params = {
					numrow : numrow,
					rejectText : rejectText,
				}
				$.ajax({
					type : "GET",
					url: "/admin/{{$folder}}/del_content",
					data : params,
					beforeSend : function(data){
						swal("ทำการเปลี่ยนแปลงข้อมูลนี้เรียบร้อยแล้ว", {icon: "success",});
					},complete : function(){
							window.location.assign('/admin/receipt_wait/index');
						}
					});
			}
		})
		

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

	//   $("a[id^='content_del']").click(function(){
	// 		var numrow = $(this).attr("id");
	// 		numrow = numrow.substr(11);
	// 		var params = {
	// 		  	numrow : numrow,
	// 		  }
	// 		swal({
	// 				title: 'คุณแน่ใจที่จะทำการลบข้อมูลนี้?',
	// 				text: 'เมื่อทำการลบข้อมูลนี้ จะไม่สามารถกู้กลับมาได้!',
	// 				icon: 'error',
	// 				buttons: {
	// 					cancel : {
	// 						text: 'ยกเลิก',
	// 						value: null,
	// 						visible: true,
	// 						className: 'btn btn-default',
	// 						closeModal: true,
	// 					},
	// 					confirm : {
	// 						text: 'ทำการลบ',
	// 						value: true,
	// 						visible: true,
	// 						className: 'btn btn-danger',
	// 						closeModal: true
	// 					}
	// 				}
	// 			}).then((willDelete) => {
	// 				  if (willDelete) {
	// 				  	$.ajax({
	// 						type : "GET",
	// 						url: "/admin/{{$folder}}/del_content",
	// 						data : params,
	// 						beforeSend : function(data){
	// 							$("#content"+numrow).hide();
	// 							swal("ทำการลบข้อมูลนี้เรียบร้อยแล้ว", {icon: "success",});
								
	// 						},
	// 					 	complete : function(){
	// 						 	//window.location.assign('');
	// 						}
	// 						});
	// 				  }
	// 			});
	// 	});// Delete CONTENT

		
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

		$('#region').on('change', function() {
            var val =  this.value;
            $.ajax({
                url: "/province",
                method: "POST",
                data: {"_token": "{{ csrf_token() }}","val":val,},
                success: function(data){

                    if(data.status == 'success'){
                        $("#show_province").html(data.data);
                    }else{
                        swal("กรุณาเลือกภาคใหม่อีกครั้ง", "", "error");
                    }
                }
            })

        });

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