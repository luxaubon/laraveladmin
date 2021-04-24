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
									<a href="#default-tab-sup-6" data-toggle="tab" class="nav-link">
										<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-image"></i> Image</span>
										<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-image"></i> Image</span>
									</a>
								</li>

							</ul>

                            <div class="tab-content m-b-0 ">

                                <div class="tab-pane fade active show" id="default-tab-sup-1">
                                <!-- Start TAP -->
				                     <div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">
	                        				SEO Title <span class="text-danger">*</span></label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="seo" name="seo" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('seo') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="title" name="title" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('title') }}</textarea>

				                       		</div>
				                       	</div>

                             		<!-- <div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Detail</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="caption_th" name="caption_th" rows="2" placeholder="Caption" data-parsley-required="true">{{ old('caption_th') }}</textarea>

				                       		</div>
				                       	</div> -->

                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Detail</label>
	                        				<div class="col-sm-12">
				                            	 <textarea class="ckeditor" id="detail" name="detail" rows="20" >{{ old('detail') }}</textarea>
				                       		</div>
				                       	</div>

                                <!-- END TAP -->
                                </div>

								<div class="tab-pane fade" id="default-tab-sup-6">
                                <!-- Start TAP -->
                                	<div class="clearfix m-b-20">
					                       	<div class="profile-cover">
						                		<div class="blah">
						                			<i class="fa fa-camera fa-3x"></i><br>Select Cover Images<br>
						                		</div>
										        <div id="img-cover" ></div>
					                			<input name="image" type="file" class="file_input_hidden" id="slide" onchange="javascript: document.getElementById('slide').value = this.value" accept="image/*" />
						                	</div>
					                	</div>
                                <!-- END TAP -->
                                </div>
								
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 bg-grey-light">
								@IF(Auth::user()->status == 1)
								<p class="m-b-10 p-0 ">
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>
								</p>
								@endif

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
											
											<hr>
											<label class="control-label">Code </label>
											<input type="text" class="form-control" id="code_number" name="code_number" value="{{ old('code_number') }}" required>
											
											<hr>
											<label class="control-label">กรอก Shop Code </label>
											<select class="form-control" id="shop_code" name="shop_code">
												<option class="text-success-light" value="0">Published</option>
												<option class="text-danger-light" value="1">Draft</option>	
											</select>
											<hr>
											<label class="control-label">นับถอยหลัง </label>
											<select class="form-control" id="count_down" name="count_down">
												<option class="text-success-light" value="0" >Published</option>
												<option class="text-danger-light" value="1" >Draft</option>	
											</select>
											
											<hr>
											<label class="control-label">กรอกเลขที่ใบเสร็จ </label>
											<select class="form-control" id="receipt_number" name="receipt_number">
												<option class="text-success-light" value="0">Published</option>
												<option class="text-danger-light" value="1">Draft</option>	
											</select>

											<hr>
											<label class="control-label">อัพโหลดใบเสร็จ </label>
											<select class="form-control" id="receipt_upload" name="receipt_upload">
												<option class="text-success-light" value="0">Published</option>
												<option class="text-danger-light" value="1">Draft</option>	
											</select>
											<hr>

											<div class="panel-group" id="groupcontent">
												<div class="panel panel-inverse overflow-hidden">
												<label class="control-label">คูปองส่วนลดพิเศษ </label>
													<div class="row">
													@foreach ($user as $db)
														<label class="checkbox-inline  text-default-light col-6">
															<input type="checkbox" name="sid[]" id="sid" value="{{$db->id}}"> {{ $db->name }}( {{ $db->phone }} )
														</label>
													@endforeach
													</div>
												</div>
											</div>

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
