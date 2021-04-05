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
				                            <textarea class="form-control" id="seo_th" name="seo_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{@json_decode($pages_id->seo)[0]->seo_th}}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="name_th" name="name_th" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{@json_decode($pages_id->name)[0]->name_th}}</textarea>

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
				                            <textarea class="form-control" id="seo_en" name="seo_en" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{@json_decode($pages_id->seo)[0]->seo_en}}</textarea>

				                       		</div>
				                       	</div>
                              		<div class="clearfix m-b-20">
	                        				<label class="control-label col-sm-2" for="title">Title</label>
	                        				<div class="col-sm-12">
				                            <textarea class="form-control" id="name_en" name="name_en" rows="2" data-parsley-range="[1,200]" placeholder="Title, Header.." data-parsley-required="true">{{@json_decode($pages_id->name)[0]->name_en}}</textarea>

				                       		</div>
				                       	</div>
                                <!-- END TAP -->
                                </div>

                                <div class="tab-pane fade" id="default-tab-sup-4">
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
	                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	                                            Setting
	                                        </a>
	                                    </h3>
	                                </div>
	                                <div id="collapse1" class="panel-collapse collapse show">
	                                	<div class="panel-body">

	                                	<label class="control-label">Menu</label>
										<select class="form-control" id="parent_id" name="parent_id" >
											<option class="text-success-light" value="0">Main Menu</option>

											@foreach ($mainmenu as $db)
											<?php $selected = $pages_id->parent_id == $db->id ?  "selected" : ""; ?>
												<option class="text-danger-light" value="{{$db->id}}" {{$selected }}>{{@json_decode($db->name)[0]->name_th}}</option>
											@endforeach
												
										 </select>

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
