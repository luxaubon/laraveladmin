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
				                     

                                <!-- END TAP -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 bg-grey-light">
							  <p class="m-b-10 p-0 ">
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>
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
	                                            <input type="number" class="form-control" name="luckynumber" value="{{ old('luckynumber') }}" required>
	                                        </div>
											<hr>

	                                    <label class="control-label">การแสดงผล </label>
										<select class="form-control" id="online" name="online" required>
											<option class="text-success-light" value="">การแสดงผล</option>
											<option class="text-danger-light" value="1">ไม่แสดง</option>
											<option class="text-success-light" value="2">แสดง</option>	
										 </select>

                                         <hr>
										
	                                	 <label class="control-label">เวลาเริ่มต้น </label>
		                                   	<div class="input-group date" id="datetimepicker1">
	                                            <input type="datetime-local" class="form-control" name="date_start" value="{{ old('date_start') }}" required>
	                                           
	                                        </div>
                                         <hr>
	                                   	 <label class="control-label">เวลาสินสุด </label>
	                                   	<div class="input-group date" id="datetimepicker2">
                                            <input type="datetime-local" class="form-control" name="date_stop" value="{{ old('date_stop') }}" required/>
                                            
                                        </div>
										<hr>

	                                    <label class="control-label">รสชาติ </label>
										<select class="form-control" id="status" name="status" required>
											<option class="text-success-light" value="">รสชาติ</option>
											<option class="text-success-light" value="1">Lemon</option>
											<option class="text-danger-light" value="2">Orange</option>	
											<option class="text-danger-light" value="3">Mix Berry</option>	
										 </select>
										</div>
	                                </div>
	                            </div>
	                            <!-- end panel -->
	                             <!-- begin panel -->
	                           
	                         
	                        <!-- end panel -->
				   			</div>
	                    <!-- end col-6 -->
	                </div>
         </div>
