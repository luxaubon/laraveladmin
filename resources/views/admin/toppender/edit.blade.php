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
				                     <div class="clearfix m-b-20">
										<table id="data-table-default" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-nowrap">No.</th>
													<th class="text-nowrap">ชื่อ นามสกุล</th>
													<th class="text-nowrap">เบอร์</th>
													<th class="text-nowrap">Point</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$i = 1;
													foreach($user as $db){
													echo '<tr class="odd gradeX">
														<th class="text-nowrap">'.$i++.'</th>
														<th class="text-nowrap">'.$db->name.'  '.$db->last_name.'</th>
														<th class="text-nowrap">'.$db->phone.'</th>
														<th class="text-nowrap">'.$db->totals.'</th>
														</td>
													</tr>';
													}?>
											</tbody>
										</table>
				                    </div>

                                <!-- END TAP -->
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 bg-grey-light">
							  <p class="m-b-10 p-0 ">
							  @if(Auth::id() == 1)
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>
								@endif
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
										   <label class="control-label">จำนวนรางวัล </label>
										   <div class="input-group date" >
	                                            <input type="number" class="form-control" name="luckynumber" value="{{ $pages_id->luckynumber }}" >
	                                        </div>
											<hr>
											@php
												$selected_online_1 = $pages_id->online == 1 ?  "selected" : "";
												$selected_online_2 = $pages_id->online == 2 ?  "selected" : "";
	                                    	@endphp
											<label class="control-label">การแสดงผล </label>
												<select class="form-control" id="online" name="online" required>
													<option class="text-success-light" value="">การแสดงผล</option>
													<option class="text-danger-light" value="1" {{ $selected_online_1 }}>ไม่แสดง</option>
													<option class="text-success-light" value="2" {{ $selected_online_2 }}>แสดง</option>	
												</select>
                                         <hr>
											@php
				                            	$date_stop = $pages_id->date_stop != '' ?  date('Y-m-d\TH:i:s',$pages_id->date_stop) : "";
				                            	$date_start = $pages_id->date_start != '' ?  date('Y-m-d\TH:i:s',$pages_id->date_start) : "";
											@endphp
	                                	 <label class="control-label">เวลาเริ่มต้น </label>
		                                   	<div class="input-group date" id="datetimepicker1">
	                                            <input type="datetime-local" class="form-control" name="date_start" value="<?=$date_start;?>" >
	                                            
	                                        </div>
                                         <hr>
                                    
	                                   	 <label class="control-label">เวลาสินสุด </label>
	                                   	<div class="input-group date" id="datetimepicker2">
                                            <input type="datetime-local" class="form-control" name="date_stop" value="<?=$date_stop;?>"/>
                                            
                                        </div>
                                        <hr>
										<label class="control-label">รสชาติ </label>
	                                    @php
	                                    	$selected = $pages_id->status == 1 ?  "selected" : "";
	                                    	$selected2 = $pages_id->status == 2 ?  "selected" : "";
											$selected3 = $pages_id->status == 3 ?  "selected" : "";
	                                    @endphp
										<select class="form-control" id="status" name="status">
										<option class="text-success-light" value="1" {{ $selected }}>Lemon</option>
											<option class="text-danger-light" value="2" {{ $selected2 }}>Orange</option>	
											<option class="text-danger-light" value="3" {{ $selected3 }}>Mix Berry</option>	
										 </select>
                                    	</div>

	                                </div>
	                            </div>
	                            <!-- end panel -->

	                        
	                        <!-- end panel -->
				   			</div>
	                    <!-- end col-6 -->
	                </div>
         </div>
