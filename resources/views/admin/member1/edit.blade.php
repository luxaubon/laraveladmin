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
										<label class="control-label col-sm-2" for="title">จำนวนส่วนลดที่แสดง</label>
										<div class="col-sm-12">
											<textarea class="form-control" id="namecode" name="namecode" rows="2" placeholder="จำนวนส่วนลดที่แสดง" data-parsley-required="true">{{$pages_id->namecode}}</textarea>
										</div>
									</div>
									<!--<div class="clearfix m-b-20">
										<label class="control-label col-sm-2" for="title">Code</label>
										<div class="col-sm-12">
											<input type="text" class="form-control" id="code" name="code" placeholder="Code"  value="{{$pages_id->code}}">
										</div>
									</div> -->
									<div class="clearfix m-b-20">
										<label class="control-label col-sm-2" for="title">จำนวนส่วนลดที่สามารถใช้ได้</label>
										<div class="col-sm-12">
											<input type="number" class="form-control" id="numbercode" name="numbercode" placeholder="จำนวนส่วนลดที่สามารถใช้ได้" value="{{$pages_id->numbercode}}">
										</div>
									</div>
									<div class="clearfix m-b-20">
										<label class="control-label col-sm-2" for="title">% ในการออกรางวัล</label>
										<div class="col-sm-12">
											<input type="number" class="form-control" id="percentage" name="percentage" placeholder="% ในการออกรางวัล" value="{{$pages_id->percentage}}">
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
	                                   		<!--label class="control-label">หัวข้อ </label>
											<select class="form-control" id="topic" name="topic">
												<option class="text-success-light" value="0" >News</option>
												<option class="text-danger-light" value="1" >Event</option>	
											</select>
											<hr-->
											
										<label class="control-label">Status </label>
	                                    @php
	                                    	$selected = $pages_id->online == 0 ?  "selected" : "";
	                                    	$selected2 = $pages_id->online == 1 ?  "selected" : "";
	                                    @endphp
										<select class="form-control" id="online" name="online">
											
											<option class="text-success-light" value="0" {{ $selected }}>Published</option>
											<option class="text-danger-light" value="1" {{ $selected2 }}>Draft</option>
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
