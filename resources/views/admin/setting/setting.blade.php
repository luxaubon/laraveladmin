			<div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="clearfix m-b-20">
            				<label class="control-label col-sm-2" for="title">
            					Image 
							</label>
            				<div class="col-sm-10">
								<div class="thumbnail width-xs">
									<div class="profile-thum"  style="height: 200px;">
									
									@if($pages->image != '') 

										<div  id="cover-thumb" style="background:url('{{ asset('public/images/'.$pages->image) }}'); background-position:center center; background-size:cover; width:100%; height:200px; position: absolute;z-index: 5;"></div>
									
									@endif
									<div class="blah"><i class="fa fa-camera fa-2x"></i><br>
									Select images</div>

									<div id="img-thumb"></div>
									<div id="img-thumb-cover"></div>
									<input name="image" type="file" class="file_input_hidden" id="image" onchange="javascript: document.getElementById('image').value = this.value" accept="image/*" />

									</div>
								</div><small>Upload only (.ico)</small>
                       		</div>
                       	</div>
                       	<div class="clearfix m-b-20">
	            				<label class="control-label col-sm-2" for="title">
									Facebook ID
	        					</label>
	            				<div class="col-sm-12">
	                            <input type="text" class="form-control" id="fb_id" name="fb_id" value="{{@json_decode($pages->seo)[0]->fb_id}}">
	                       		</div>
	                       	</div>
	             		<div class="clearfix m-b-20">
	            				<label class="control-label col-sm-2" for="title">
	            					Title
	            				</label>
	            				<div class="col-sm-12">
	                            <textarea class="form-control" id="title" name="title" rows="2" placeholder="Title" data-parsley-required="true">{{@json_decode($pages->seo)[0]->title}}</textarea>

	                       		</div>
	                       	</div>
	             		<div class="clearfix m-b-20">
	            				<label class="control-label col-sm-2" for="title">
	            					Keyword
	            				</label>
	            				<div class="col-sm-12">
	                            <textarea class="form-control" id="keyword" name="keyword" rows="2" placeholder="Keyword" data-parsley-required="true">{{@json_decode($pages->seo)[0]->keyword}}</textarea>

	                       		</div>
	                       	</div>
	             		<div class="clearfix m-b-20">
	            				<label class="control-label col-sm-2" for="title">Description</label>
	            				<div class="col-sm-12">
	                            <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description" data-parsley-required="true">{{@json_decode($pages->seo)[0]->description}}</textarea>

	                       		</div>
	                       	</div>
	            		<div class="clearfix m-b-20">
		                		<label class="control-label col-sm-2">Cover</label>
		                		<div class="col-sm-12">
		                       	<div class="profile-cover" style="height: 236px;"> 
		                       		<?PHP 
		                       		/*if($dbsetting["imagefb"] != "") { 
		                       			$slidefacebook = base_url().'uploaded/images/'.$dbsetting["imagefb"];
		                       			echo '<div  id="cover-share" style="background:url('.$slidefacebook.'); background-position:center center; background-size:cover; width:100%; height:263px; position: absolute;  z-index: 5;"></div>'; }*/  ?>
		                       		@if($pages->imagefb != '') 
										<div  id="cover-share" style="background:url('{{ asset('public/images/'.$pages->imagefb) }}'); background-position:center center; background-size:cover; width:100%; height:350px; position: absolute;  z-index: 5;"></div>

										 } 
									@endif
			                		<div class="blah">
			                			<i class="fa fa-camera fa-3x"></i><br>Cover Images Facebook <br>
			                		</div>

			                		<div id="img-facebook"></div>
			                		<div id="img-thumb-facebook"></div>
		                			<input name="imagefb" type="file" class="file_input_hidden" id="slidefacebook" onchange="javascript: document.getElementById('slidefacebook').value = this.value" accept="image/*" />

			                	</div>
			                	</div>
		                	</div>
                        <!-- end panel -->
                    </div>
			</div>
                    