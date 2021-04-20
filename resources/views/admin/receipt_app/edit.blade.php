			<div class="row">
					<div class="col-md-8 alert alert-dark">
                        <!-- begin panel -->
                        <div class="panel">
                            <ul class="nav nav-tabs">

								<li class="nav-items">
									<a href="#default-tab-sup-1" data-toggle="tab" class="nav-link active">
										<span class="d-sm-none">
											<img src="{{asset('/icon/flag-th.png')}}">
										</span>
										<span class="d-sm-block d-none">
											<img src="{{asset('/icon/flag-th.png')}}" height="25px">
										</span>
									</a>
								</li>
								<li class="nav-items">
									<a href="#default-tab-sup-4" data-toggle="tab" class="nav-link">
										<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-images"></i> Receipt images</span>
										<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-images"></i> Receipt images</span>
									</a>
								</li>
								
							</ul>
                            <div class="tab-content m-b-0 ">
                            	
                                <div class="tab-pane fade active show" id="default-tab-sup-1">
                                <!-- Start TAP -->
									<?php $products = array(0,1,2,3,4,5,6); ?>

									 <div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 1</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_1" name="receipt_product_1" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_1){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>
												</select>
											</div>
									</div>
									<div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 2</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_2" name="receipt_product_2" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_2){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>
												</select>
											</div>
									</div>
									<div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 3</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_3" name="receipt_product_3" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_3){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>
												</select>
											</div>
									</div>
									<div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 4</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_4" name="receipt_product_4" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_4){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>
												</select>
											</div>
									</div>
									<div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 5</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_5" name="receipt_product_5" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_5){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>	
												</select>
											</div>
									</div>
									<div class="clearfix m-b-20">
									 		<label class="control-label col-sm-12" for="title">กลุ่มสินค้าที่ชื้อร่วม 6</label>
											 <div class="col-sm-12">
												<select class="form-control" id="receipt_product_6" name="receipt_product_6" required>
													<option class="text-success-light" value="" >กรุณาเลือก กลุ่มสินค้าที่ชื้อร่วม</option>
													<?php 
													foreach($products as $myArray){
														switch ($myArray) {
															case 0 : $txt = '-- ไม่เลือก --'; break;
															case 1 : $txt = 'ผลิตภัณฑ์ทำความสะอาด'; break;
															case 2 : $txt = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
															case 3 : $txt = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
															case 4 : $txt = 'อุปกรณ์ทำความสะอาด'; break;
															case 5 : $txt = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
															case 6 : $txt = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
															case 7 : $txt = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
															case 8 : $txt = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
															case 9 : $txt = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
															default : $txt = ''; break;
														}
														if($myArray == $pages_id->receipt_product_6){
															echo '<option class="text-success-light" value="'.$myArray.'" selected>'.$txt.'</option>';
														}else{
															echo '<option class="text-success-light" value="'.$myArray.'" >'.$txt.'</option>';
														}
														
													}?>	
												</select>
											</div>
									</div>
                                <!-- END TAP -->
                                </div>


                                <div class="tab-pane fade" id="default-tab-sup-2">
                                <!-- Start TAP -->
                                	
                                <!-- END TAP -->
                                </div>	
                                

                                <!-- END TAP -->
                               


								<div class="tab-pane fade" id="default-tab-sup-4">
                                <!-- Start TAP -->
									<div id="uppic_form">
                        				<div class="clearfix m-b-30 ">
                        					@include('admin.'.$folder.'.upload_photo_multi')
                        				</div>
										<div id="gallery_group">
											<ul class="gallery-list" id="sortable">  

												@foreach($image as $value)
													@if ($value['id'] != '')

													<li id="{{ $value['id'] }}">
															<div class="image-container" >
																<div class="image" style="cursor: move; background:url({{ asset('/images/'.$pages_id->member_id.'/'.$value['image']) }}); background-position:center center; background-size:cover;">
																</div>
																<div class="btn-list">
																	<a href="{{ asset('/images/'.$pages_id->member_id.'/'.$value['image']) }}" class="image-link btn btn-white btn-xs">
																		<i class="fa fa-search-plus"></i></a>
																</div>
																<div class="btn-list2">
																	<a href="javascript:;" class="btn btn-danger btn-xs" id="del_img{{ $value['id'] }}"><i class="fa fa-trash"></i></a>
																</div>
																<div class="info">                                       
																	<small class="text-muted">{{ $value['created_at']->diffForHumans() }}</small>
																</div>
															</div>
														</li>

													@endif
                 								@endforeach
										</ul>
										</div>
									</div>
                                <!-- END TAP -->
                                </div>

                                <div class="tab-pane fade" id="default-tab-sup-5">
                                <!-- Start TAP -->
                                	
                                <!-- END TAP -->
                                </div>
                                <div class="tab-pane fade" id="default-tab-sup-6">
                                <!-- Start TAP -->
                                	
                                <!-- END TAP -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 bg-grey-light">
							  <p class="m-b-10 p-0 ">

								<!-- UPDATE BUTTON -->
								<?php if(Auth::user()->status == 1){ ?>
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>

									<a href="javascript::void(0)" id="content_del{{$pages_id->id}}" class="btn btn-danger m-t-5" >Reject </a>
								<?php } ?>
								<!-- UPDATE BUTTON -->

							  </p>

								<div class="panel-group alert alert-dark" id="accordion">
									@if(count($errors))
									<div class="panel panel-inverse overflow-hidden">
											<div class="panel-heading">
												<h3 class="panel-title">
													<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
														Error
													</a>
												</h3>
											</div>
											<div id="collapse3" class="panel-collapse collapse show">
											<div class="panel-body">
											@include('admin.layouts.error')
											</div>
										</div>
									</div>
									@endif
	                        
	                            <!-- begin panel -->
	                            <div class="panel panel-inverse overflow-hidden">
	                                <div class="panel-heading">
	                                    <h3 class="panel-title">
	                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	                                            Setting
	                                        </a>
	                                    </h3>
	                                </div>
	                                <div id="collapse1" class="panel-collapse collapse show">
	                                   	<div class="panel-body">
										   <label class="control-label">Status </label>
											<select class="form-control" id="receipt_status" name="receipt_status" required>
												<?php
												$status_wait  		= ($pages_id->receipt_status == 1) ? 'selected' : '';
												$status_approved 	= ($pages_id->receipt_status == 2) ? 'selected' : '';
												echo '<option class="text-success-light" value="1" '.$status_wait.'>Waiteing</option>
													  <option class="text-danger-light" value="2" '.$status_approved.'>Approved</option>';
												?>
											</select>
											<hr>
	                                   		<label class="control-label">ร้านค้า </label>
											<select class="form-control" id="status_shop" name="status_shop" required>
												<?php
												$status_shop_dealer  = ($pages_id->status_shop == 'dealer') ? 'selected' : '';
												$status_shop_company = ($pages_id->status_shop == 'company') ? 'selected' : '';
												echo '<option class="text-success-light" value="dealer" '.$status_shop_dealer.'>ร้านตัวแทนจำหน่าย</option>
													  <option class="text-danger-light" value="company" '.$status_shop_company.'>ร้านค้าชั้นนำ</option>';
												?>
											</select>
											<hr>
											<div id="allRegion">
												<label class="control-label">ภูมิภาค </label>
												<select class="form-control" name="region" id="region">
													<option value="">กรุณาเลือกภูมิภาค</option>
													<?php 
														foreach($region as $region){ 
															$region_selected  = ($pages_id->region_name == $region->region_name) ? 'selected' : '';
															echo '<option value="'.$region->region_name.'" '.$region_selected.'>'.$region->region_name.'</option>';
														}
													?>
												</select>
												<label class="control-label">จังหวัด </label>
												<div id="show_province">
													<select class="form-control" name="province" id="province">
														<?php 
															if($pages_id->region_province){
																echo '<option value="'.$pages_id->region_province.'">'.$pages_id->region_province.'</option>';
															}else{	
																echo '<option value="">กรุณาเลือกจังหวัด</option>';
															}
														?>
													</select>
												</div>
												<label class="control-label">ชื่อร้าน </label>
												<div id="show_shop_name">
													<select class="form-control" name="region_id_dealer" id="region_id_dealer">
														<?php 
															if($pages_id->shop_name){
																echo '<option value="'.$pages_id->region_id.'">'.$pages_id->shop_name.'</option>';
															}else{	
																echo '<option value="">กรุณาเลือกร้าน</option>';
															}
														?>
													</select>
												</div>
											<hr>
											</div>
											<div id="showShopname">
												<label class="control-label">ชื่อร้าน </label>
													<select class="form-control" name="region_id_company" id="region_id_company">
														<?php 
														foreach($shop_name as $shop_name){ 
															$region_selected_shop_name  = ($pages_id->region_id == $shop_name->region_id) ? 'selected' : '';
															echo '<option value="'.$shop_name->region_id .'" '.$region_selected_shop_name.'>'.$shop_name->shop_name.'</option>';
														}
														?>
													</select>
											<hr>
											</div>
											
											<label class="control-label">เลขที่ใบเสร็จ </label>
											<input type="text" class="form-control" id="receipt_number" name="receipt_number" value="{{@$pages_id->receipt_number}}" required>
											
											@php
				                            	$dateReceipt = $pages_id->receipt_date != '' ?  date('Y-m-d\TH:i:s',$pages_id->receipt_date) : "";
											@endphp
											<label class="control-label">วันและเวลา </label>
											<input type="datetime-local" class="form-control" id="receipt_date" name="receipt_date" value="<?=$dateReceipt;?>" required>

											<label class="control-label">ยอดเงิน </label>
											<input type="number" class="form-control" id="receipt_price" name="receipt_price" value="{{@$pages_id->receipt_price}}" required>

											<label class="control-label">ยอดสิทธิ์ </label>
											<input type="number" class="form-control" id="receipt_point" name="receipt_point" value="{{@$pages_id->receipt_point}}" required>

											<hr>
											
										
                                    	</div>

	                                </div>
	                            </div>
	                            <!-- end panel -->

	                        
	                        <!-- end panel -->
				   			</div>
	                    <!-- end col-6 -->
	                </div>
         </div>

		 <div class="modal fade" id="modal-dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Reject </h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<p>
							<input type="hidden" id="myid">
							<textarea class="form-control" rows="3" id="rejectText"></textarea>
						</p>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">ยกเลิก</a>
						<a href="javascript:;" class="btn btn-success" id="btnSendReject">ตกลง</a>
					</div>
				</div>
			</div>
		</div>