			<div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">SMS User <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="user" name="user" rows="2" placeholder="SMS User" data-parsley-required="true">{{@json_decode($pages->payment)[0]->user}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">SMS Password <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="pass" name="pass" rows="2" placeholder="SMS Password " data-parsley-required="true">{{@json_decode($pages->payment)[0]->pass}}</textarea>
								</div>
				        </div>
                        <!-- end panel -->
                    </div>
			</div>
                    