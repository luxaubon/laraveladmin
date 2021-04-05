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
	                        				<label class="control-label col-sm-2" for="title">
	                        				รอบการร่วมสนุก <span class="text-danger">*</span></label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="seo_th" name="seo_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('seo_th') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">การจับรางวัล</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="title_th" name="title_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('title_th') }}</textarea>

				                       		</div>
				                       	</div>
                             		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">ราละเอียดย่อย</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="caption_th" name="caption_th" rows="2" placeholder="Caption" data-parsley-required="true">{{ old('caption_th') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">รายละเอียด</label>
	                        				<div class="col-sm-12">
				                            	 <textarea class="ckeditor" id="detail_th" name="detail_th" rows="20" >{{ old('detail_th') }}</textarea>
				                       		</div>
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
	                                    <label class="control-label">สถานะ </label>
										<select class="form-control" id="online" name="online">
											<option class="text-success-light" value="0">Published</option>
											<option class="text-danger-light" value="1">Draft</option>	
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
