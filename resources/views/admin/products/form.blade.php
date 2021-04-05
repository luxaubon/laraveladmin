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
									<a href="#default-tab-sup-2" data-toggle="tab" class="nav-link">
										<span class="d-sm-none">
											<img src="{{asset('/icon/flag-en.png')}}">
										</span>
										<span class="d-sm-block d-none">
											<img src="{{asset('/icon/flag-en.png')}}" height="25px">
										</span>
									</a>
								</li>
								<li class="nav-items">
									<a href="#default-tab-sup-4" data-toggle="tab" class="nav-link">
										<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-images"></i> Gallery</span>
										<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-images"></i> Gallery</span>
									</a>
								</li>
								<li class="nav-items">
									<a href="#default-tab-sup-5" data-toggle="tab" class="nav-link">
										<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-share-alt"></i> Share Social</span>
										<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-share-alt"></i> Share Social</span>
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
	                        				Title SEO <span class="text-danger">*</span></label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="seo_th" name="seo_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('seo_th') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="title_th" name="title_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('title_th') }}</textarea>

				                       		</div>
				                       	</div>
                             		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Caption</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="caption_th" name="caption_th" rows="2" placeholder="Caption" data-parsley-required="true">{{ old('caption_th') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Detail</label>
	                        				<div class="col-sm-12">
				                            	 <textarea class="ckeditor" id="detail_th" name="detail_th" rows="20" >{{ old('detail_th') }}</textarea>
				                       		</div>
				                       	</div>

                                <!-- END TAP -->
                                </div>


                                <div class="tab-pane fade" id="default-tab-sup-2">
                                <!-- Start TAP -->
                                	<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">
	                        				Title SEO <span class="text-danger">*</span></label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="seo_en" name="seo_en" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('seo_en') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="title_en" name="title_en" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('title_en') }}</textarea>

				                       		</div>
				                       	</div>
                             		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Caption</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="caption_en" name="caption_en" rows="2" placeholder="Caption" data-parsley-required="true">{{ old('caption_en') }}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Detail</label>
	                        				<div class="col-sm-12">
				                            	 <textarea class="ckeditor" id="detail_en" name="detail_en" rows="20" >{{ old('detail_en') }}</textarea>
				                       		</div>
				                       	</div>
                                <!-- END TAP -->
                                </div>

                                <div class="tab-pane fade" id="default-tab-sup-4">
                                <!-- Start TAP -->
                                	<div id="uppic_form">
                        				<div class="clearfix m-b-30 ">
                        					@include('admin.page.upload_photo_multi')
                        				</div>
										<div id="gallery_group">
											<ul class="gallery-list" id="sortable">
											</ul>
										</div>
									</div>
                                <!-- END TAP -->
                                </div>
                                <div class="tab-pane fade" id="default-tab-sup-5">
                                <!-- Start TAP -->
                                	<div class="clearfix m-b-20">
					                		<label class="control-label col-sm-2">Cover Facebook </label>
					                		<div class="col-sm-12">
					                       	<div class="profile-cover" style="height: 236px;">
						                		<div class="blah">
						                			<i class="fa fa-camera fa-3x"></i><br>Cover Images Facebook <br>
						                		</div>
						                		<div id="img-facebook"></div>
						                		<div id="img-thumb-facebook"></div>
					                			<input name="slidefacebook" type="file" class="file_input_hidden" id="slidefacebook" onchange="javascript: document.getElementById('slidefacebook').value = this.value" accept="image/*" />
						                	</div>
						                	</div>
					                	</div>
                                	<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">
	                        				Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="title_ss" name="title_ss" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{ old('title_ss') }}</textarea>

				                       		</div>
				                       	</div>
                               		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">
	                        				Description</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="description_ss" name="description_ss" rows="2" data-parsley-range="[1,200]" placeholder="Description" data-parsley-required="true">{{ old('description_ss') }}</textarea>

				                       		</div>
				                       	</div>
				                     <div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">
	                        				ตัวอย่างรูปในการแสดง</label>
	                        				<div class="col-sm-12">
				                            <img src="{{ asset('assets/img/bgshare.png') }}" style="display: block;width: 100%;height: auto;">
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
					                			<input name="slide" type="file" class="file_input_hidden" id="slide" onchange="javascript: document.getElementById('slide').value = this.value" accept="image/*" />
						                	</div>
					                	</div>
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
								<!-- VIEW BUTTON 
									<a href=""  target="_blank" class="btn btn-info m-t-5" id="btnrv">
									<i class="fas fa-lg fa-fw m-r-10 fa-reply"></i></a>
								<!-- VIEW BUTTON -->

								<!-- INSER BUTTON 
									<button type="button"  id="SaveNew" class="btn btn-primary m-t-5" >
									<i class="fa fa-save"></i> Save New</button>
								<!-- INSER BUTTON -->
								<!-- DELETE BUTTON 
									<button type="button" id="New_delete" class="btn btn-danger m-t-5">
									<i class="fa fa-trash" title="Delete Article"></i></button>
								<!-- DELETE BUTTON -->

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
	                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
	                                            หัวข้อ
	                                        </a>
	                                    </h3>
	                                </div>
	                                <div id="collapse2" class="panel-collapse collapse show">
	                                   <div class="panel-body">
										<div class="panel-group" id="groupcontent">
											<div class="panel panel-inverse overflow-hidden">
												<div class="row">
												@foreach ($menu as $db)
													<label class="checkbox-inline  text-default-light col-6">
														<input type="checkbox" name="topic[]" id="topic" value="{{$db->id}}"> {{json_decode($db->name)[0]->name_th}}
													</label>
												@endforeach
												</div>
											</div>
										</div>
	                                </div>
	                            </div>
	                        </div>

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
	                                   	
											
                                    	<label class="control-label">Code :</label>
										<input name="code" id="code" class="form-control" value="{{ old('code') }}">
										<hr>
                                    	<label class="control-label">Price :</label>
										<input name="price" id="price" class="form-control" value="{{ old('price') }}">

										<hr>
										<div class="profile-thum"  style="height: 200px;">
						                	<div class="blah"><i class="fa fa-camera fa-2x"></i><br>Select images<br></div>
						                	<div id="img-thumb"></div>
						                	<div id="img-thumb-cover"></div>
						                	<input name="image" type="file" class="file_input_hidden" id="image" onchange="javascript: document.getElementById('image').value = this.value" accept="image/*" />

						                	</div>
                                    	<hr>
	                                	 <label class="control-label">เวลาเริ่มต้น </label>
		                                   	<div class="input-group date" id="datetimepicker1">
	                                            <input type="text" class="form-control" name="date_start" value="{{ old('date_start') }}" >
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-calendar"></i>
	                                            </div>
	                                        </div>
                                         <hr>
	                                   	 <label class="control-label">เวลาสินสุด </label>
	                                   	<div class="input-group date" id="datetimepicker2">
                                            <input type="text" class="form-control" name="date_stop" value="{{ old('date_stop') }}"/>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        <!--hr>
                                    	<label class="control-label">แท็ก :</label>
										<input name="tages" id="jquery-tagIt-inverse" class="tages" value="{{ old('tags') }}"-->
										<hr>
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
