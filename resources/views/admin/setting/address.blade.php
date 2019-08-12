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
								<li class="nav-items">
									<a href="#default-tab-sup-2" data-toggle="tab" class="nav-link">
										<span class="d-sm-none">
											<img src="{{asset('/icon/flag-en.png')}}">
										</span>
										<span class="d-sm-block d-none">
											<img src="{{asset('/icon/flag-en.png')}}" height="25px">
										</span>
									</a>
								</li>
							</ul>

                            <div class="tab-content m-b-0 ">

                                <div class="tab-pane fade active show" id="default-tab-sup-1">
                                <!-- Start TAP -->
				                     <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Company <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="company_th" name="company_th" rows="2" placeholder="Company" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->company_th}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Address <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="address_th" name="address_th" rows="2" placeholder="Address" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->address_th}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Tel <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="tel_th" name="tel_th" rows="2" placeholder="Tel" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->tel_th}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Fax <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="fax_th" name="fax_th" rows="2" placeholder="Fax" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->fax_th}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Phone <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="phone_th" name="phone_th" rows="2" placeholder="Phone" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->phone_th}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">iFram Map<span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="ifram_th" name="ifram_th" rows="2" placeholder="iFram Map" data-parsley-required="true">{{@json_decode($pages->address_th)[0]->ifram_th}}</textarea>
												</div>
								        </div>

                                <!-- END TAP -->
                                </div>


                                <div class="tab-pane fade" id="default-tab-sup-2">
                                <!-- Start TAP -->
                                	<div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Company <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="company_en" name="company_en" rows="2" placeholder="Company" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->company_en}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Address <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="address_en" name="address_en" rows="2" placeholder="Address" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->address_en}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Tel <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="tel_en" name="tel_en" rows="2" placeholder="Tel" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->tel_en}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Fax <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="fax_en" name="fax_en" rows="2" placeholder="Fax" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->fax_en}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">Phone <span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="phone_en" name="phone_en" rows="2" placeholder="Phone" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->phone_en}}</textarea>
												</div>
								        </div>
								        <div class="clearfix m-b-20">
					                        <label class="control-label col-sm-2" for="title">iFram Map<span class="text-danger">*</span></label>
					                        	<div class="col-sm-12">
								                   <textarea class="form-control" id="ifram_en" name="ifram_en" rows="2" placeholder="iFram Map" data-parsley-required="true">{{@json_decode($pages->address_en)[0]->ifram_en}}</textarea>
												</div>
								        </div>

                                <!-- END TAP -->
                                </div>

                                

                            </div>
                        </div>
                    </div>
         </div>

                    