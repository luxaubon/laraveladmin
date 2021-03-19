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
								
							</ul>
                            <div class="tab-content m-b-0 ">
                            	
                                <div class="tab-pane fade active show" id="default-tab-sup-1">
                                <!-- Start TAP -->
									<table id="data-table-buttons" class="table table-striped table-bordered">
										<thead>
											<tr>    
												<th class="text-nowrap">ลำดับ</th>
												<th class="text-nowrap">ชื่อ</th>
												<th class="text-nowrap">นามสกุล</th>
												<th class="text-nowrap">เบอร์โทร</th>
												<th class="text-nowrap">ผ่าน</th>
												<th class="text-nowrap">ผิดพลาด</th>
												<th class="text-nowrap">ซ้ำ</th>
												<th class="text-nowrap">ยกเลิก</th>
											</tr>
										</thead>
										<tbody>

											<?php 
											echo '<tr class="odd gradeX">
													<td>1</td>
													<td>'.$myArrayMember[1].'</td>
													<td>'.$myArrayMember[2].'</td>
													<td>'.$myArrayMember[3].'</td>
													<td>'.$myArrayMember[4].'</td>
													<td>'.$myArrayMember[5].'</td>
													<td>'.$myArrayMember[6].'</td>
													<td>'.$myArrayMember[7].'</td>
												</tr>';
											?>
										</tbody>
									</table>


									<table id="data-table-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>    
                                            <th class="text-nowrap">ลำดับ</th>
                                            <th class="text-nowrap">รหัส</th>
                                            <th class="text-nowrap">วันที่</th>
                                            <th class="text-nowrap">สถานะ</th>
                                            <th class="text-nowrap">รูป</th>
                                            <th class="text-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $i=0;
                                        foreach($image as $db){
                                            $i++;
                                         if($db->status == 1 ){
                                             $status = 'ผ่าน';
                                         }else if($db->status == 2){
                                            $status = 'รหัสซ้ำ';
                                        }else if($db->status == 3){
                                            $status = 'รหัสผิดพลาด';
                                        }else if($db->status == 4){
                                            $status = 'ลงทะเบียนโดย '.@$db->admin_name;
                                        }else if($db->status == 5){
                                            $status = 'ยกเลิกโดย '.@$db->admin_name;
                                        }
                                            
                                        echo '<tr class="odd gradeX">
                                                <td>'.$i.'</td>
                                                <td>'.$db->code_number.'</td>
                                                <td>'.DateThai($db->created_at).'</td>
                                                <td>'.$status.'</td>
                                                <td width="10%"> 
													<div class="card">
														<a href="'.asset('images/'.$db->sid.'/'.$db->image.'').'" class="image-link">
															<img class="card-img-top" src="'.asset('images/'.$db->sid.'/'.$db->image.'').'" />
														</a>
													</div>
												</td>
												<td><a href="javascript::void(0)" id="content_del'.$db->id.'" >Reject </a></td>
                                            </tr>';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="8">{{ $image->links() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- END TAP -->
                                </div>


                                <div class="tab-pane fade" id="default-tab-sup-2">
                                <!-- Start TAP -->
                                	
                                <!-- END TAP -->
                                </div>	
                                

                                <!-- END TAP -->
                               


                                <div class="tab-pane fade" id="default-tab-sup-4">
                                <!-- Start TAP -->
                                	
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
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>
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

										   <label class="control-label">รสชาติ </label>
											<select class="form-control" id="status" name="status" required>
												<option class="text-success-light" value="">Select</option>
												<option class="text-success-light" value="1">Lemon</option>
												<option class="text-danger-light" value="2">Orange</option>
												<option class="text-danger-light" value="3">Mix Berry</option>
											</select>
											<hr>
	                                   		<div class="profile-thum"  style="height: 200px;">
												<div class="blah">
													<i class="fa fa-camera fa-2x"></i><br>Select images<br></div>
												<div id="img-thumb"></div>
												<div id="img-thumb-cover"></div>
												<input name="image" type="file" class="file_input_hidden" required id="image" onchange="javascript: document.getElementById('image').value = this.value" accept="image/*" />
						                	</div>
											
										
                                    	</div>

	                                </div>
	                            </div>
	                            <!-- end panel -->

	                        
	                        <!-- end panel -->
				   			</div>
	                    <!-- end col-6 -->
	                </div>
         </div>
