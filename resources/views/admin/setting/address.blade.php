			<div class="row">
					<div class="col-md-12 alert alert-dark">
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
					                        <label class="control-label col-sm-2" for="title">ข้อตกลงและเงื่อนไขการร่วมกิจกรรม <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="address_th" name="address_th" rows="2" placeholder="Company" data-parsley-required="true">{{ $pages->address_th }}</textarea>
												</div>
								        </div>
										<div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">กติกาและของรางวัลกิจกรรม <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="address_en" name="address_en" rows="2" placeholder="Company" data-parsley-required="true">{{ $pages->address_en }}</textarea>
												</div>
								        </div>

                                <!-- END TAP -->
                                </div>


                                <div class="tab-pane fade" id="default-tab-sup-2">
                                <!-- Start TAP -->

                                <!-- END TAP -->
                                </div>

                                

                            </div>
                        </div>
                    </div>
         </div>

                    