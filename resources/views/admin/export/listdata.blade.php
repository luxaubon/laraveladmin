                        <div class="panel-body">

                        

                            <form class="form-inline" action="/admin/export/index" method="GET">
								<div class="form-group m-r-10">
                                    <a href="#modal-dialog"  class="btn btn-primary m-r-5 m-b-5" data-toggle="modal">Excel Download</a>
								</div>
								<div class="form-group m-r-10">
									<input type="text" class="form-control" name="search" placeholder="ค้นหารหัสใต้ฝา" >
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
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 1</th>
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 2</th>
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 3</th>
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 4</th>
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 5</th>
                                        <th class="text-nowrap">กลุ่มสินค้าที่ชื้อร่วม 6</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     $i=0;
                                     function checkTxt($data){
                                        switch ($data) {
                                            case 0 : $reTrunData = '-- ไม่เลือก --'; break;
                                            case 1 : $reTrunData = 'ผลิตภัณฑ์ทำความสะอาด'; break;
                                            case 2 : $reTrunData = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
                                            case 3 : $reTrunData = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
                                            case 4 : $reTrunData = 'อุปกรณ์ทำความสะอาด'; break;
                                            case 5 : $reTrunData = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
                                            case 6 : $reTrunData = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
                                            default : $reTrunData = ''; break;
                                        }
                                        return $reTrunData;
                                     }
                                     foreach($member as $db){
                                         $i++;
                                         
                                    echo '<tr class="odd gradeX">
                                            <td>'.$i.'</td>
                                            <td>'.$db->name.'</td>
                                            <td>'.$db->last_name.'</td>
                                            <td>'.$db->phone.'</td>
                                            <td>'.checkTxt($db->receipt_product_1).'</td>
                                            <td>'.checkTxt($db->receipt_product_2).'</td>
                                            <td>'.checkTxt($db->receipt_product_3).'</td>
                                            <td>'.checkTxt($db->receipt_product_4).'</td>
                                            <td>'.checkTxt($db->receipt_product_5).'</td>
                                            <td>'.checkTxt($db->receipt_product_6).'</td>
                                        </tr>';
                                     }
                                    ?>
                                    <tr>
                                        <td colspan="8">{{ $member->links() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade" id="modal-dialog">
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
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_1" id="receipt_product_1" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 1</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_2" id="receipt_product_2" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 2</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_3" id="receipt_product_3" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 3</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_4" id="receipt_product_4" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 4</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_5" id="receipt_product_5" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 5</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="receipt_product_6" id="receipt_product_6" checked>
                                                    <label class="form-check-label" for="defaultCheckbox">กลุ่มสินค้าที่ชื้อร่วม 6</label>
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
							</div>
                            		
 <script>
		$(document).ready(function() {
		 $("#btnCheckData").click(function (){
			event.preventDefault();
            var name 			= ($("#name").is(":checked") == true) ? 'show' : 'hide';
			var last_name 		= ($("#last_name").is(":checked") == true) ? 'show' : 'hide';
			var phone 			= ($("#phone").is(":checked") == true) ? 'show' : 'hide';
			
            var receipt_product_1 			= ($("#receipt_product_1").is(":checked") == true) ? 'show' : 'hide';
            var receipt_product_2 			= ($("#receipt_product_2").is(":checked") == true) ? 'show' : 'hide';
            var receipt_product_3 			= ($("#receipt_product_3").is(":checked") == true) ? 'show' : 'hide';
            var receipt_product_4 			= ($("#receipt_product_4").is(":checked") == true) ? 'show' : 'hide';
            var receipt_product_5 			= ($("#receipt_product_5").is(":checked") == true) ? 'show' : 'hide';
            var receipt_product_6 			= ($("#receipt_product_6").is(":checked") == true) ? 'show' : 'hide';

            var pass = $("#pass").val();

            swal("Password zip : "+pass, {icon: "success",});
            window.open('/admin/export/zip?name='+name+'&last_name='+last_name+'&phone='+phone+'&receipt_product_1='+receipt_product_1+'&receipt_product_2='+receipt_product_2+'&receipt_product_3='+receipt_product_3+'&receipt_product_4='+receipt_product_4+'&receipt_product_5='+receipt_product_5+'&receipt_product_6='+receipt_product_6+'&pass='+pass+'', '_blank');

		});
	});
	</script>
	