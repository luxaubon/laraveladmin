                        <div class="panel-body">

                        

                            <form class="form-inline" action="/admin/<?php echo $folder; ?>/index" method="GET">
								<!-- <div class="form-group m-r-10">
                                    <a href="#modal-dialog"  class="btn btn-primary m-r-5 m-b-5" data-toggle="modal">Excel Download</a>
								</div> -->
								<div class="form-group m-r-10">
									<input type="text" class="form-control" name="search" placeholder="ชื่อ - นามสกุล - เบอร์โทร" >
								</div>
								<button type="submit" class="btn btn-sm btn-warning  m-r-5">ค้นหา</button>
							</form>

                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>    
                                        <th class="text-nowrap">ลำดับ</th>
                                        <th class="text-nowrap">ชื่อ</th>
                                        <th class="text-nowrap">นามสกุล</th>
                                        <th class="text-nowrap">เบอร์โทร</th>
                                        <th class="text-nowrap">วันที่สมัคร</th>
                                        <th class="text-nowrap">สถานะ</th>
                                        <th class="text-nowrap">ร้านค้า</th>
                                        <th class="text-nowrap">Point</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     $i=0;
                                     foreach($member as $db){
                                         $i++;
                                            if($db->receipt_status == 1){
                                                $status = 'Waiting';
                                            }else if($db->receipt_status == 2){
                                                $status = 'Approved';
                                            }else if($db->receipt_status == 3){
                                                $status = 'Reject';
                                            }else{
                                                $status = 'Reject';
                                            }

                                            if($db->status_shop == 'dealer'){
                                                $txt = 'ร้านค้าตัวแทนจำหน่าย';
                                            }else{
                                                $txt = 'ร้านค้าชั้นนำ';
                                            }

                                    echo '<tr class="odd gradeX">
                                            <td>'.$i.'</td>
                                            <td><a href="/admin/'.$folder.'/show/'.$db->id.'" >'.$db->name.'</a></td>
                                            <td>'.$db->last_name.'</td>
                                            <td>'.$db->phone.'</td>
                                            <td>'.DateThai($db->created_at).'</td>
                                            <td>'.$status.' by ('.$db->admin_name.')</td>
                                            <td>'.$txt.'</td>
                                            <td>'.$db->receipt_point.'</td>
                                        </tr>';
                                     }
                                    ?>
                                    <tr>
                                        <td colspan="8">{{ $member->links() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Export file</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label">Filter Type</label>
                                            <div class="col-md-9">

                                                <div class="form-check">
                                                    <input type="hidden" value="<?php echo rand(0,99999999); ?>" id="pass" name="pass">
                                                    <input class="form-check-input" type="checkbox" value="name" id="name" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">ชื่อ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="last_name" id="last_name" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">นามสกุล</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="phone" id="phone" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">เบอร์โทร</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="code" id="code" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">รหัสใต้ฝา</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="date_register" id="date_register" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">วันที่สมัคร</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="date_register" id="status" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">สถานะ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="link_image" id="link_image" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">Link รูป</label>
                                                </div>

                                            </div>
                                        </div>

										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-white" data-dismiss="modal">ยกเลิก</a>
											<a href="javascript:;" class="btn btn-success" id="btnCheckData">ตกลง</a>
										</div>
									</div>
								</div>
							</div> -->
                            		
 <script>
	// 	$(document).ready(function() {
	// 	 $("#btnCheckData").click(function (){
	// 		event.preventDefault();
    //         var name 			= ($("#name").is(":checked") == true) ? 'show' : 'hide';
	// 		var last_name 		= ($("#last_name").is(":checked") == true) ? 'show' : 'hide';
	// 		var phone 			= ($("#phone").is(":checked") == true) ? 'show' : 'hide';
	// 		var code 			= ($("#code").is(":checked") == true) ? 'show' : 'hide';
	// 		var date_register 	= ($("#date_register").is(":checked") == true) ? 'show' : 'hide';
    //         var status 		    = ($("#status").is(":checked") == true) ? 'show' : 'hide';
	// 		var link_image 		= ($("#link_image").is(":checked") == true) ? 'show' : 'hide';
    //         var pass = $("#pass").val();

    //         swal("Password zip : "+pass, {icon: "success",});
    //         window.open('/admin/member/zip?name='+name+'&last_name='+last_name+'&phone='+phone+'&code='+code+'&date_register='+date_register+'&status='+status+'&link_image='+link_image+'&pass='+pass+'', '_blank');

	// 	});
	// });
	</script>
	