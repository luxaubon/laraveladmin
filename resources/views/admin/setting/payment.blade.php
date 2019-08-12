			<div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Pompay <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="pompay" name="pompay" rows="2" placeholder="pompay" data-parsley-required="true">{{@json_decode($pages->payment)[0]->pompay}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">OMISE_PUBLIC_KEY Omise<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="opk" name="opk" rows="2" placeholder="OMISE_PUBLIC_KEY" data-parsley-required="true">{{@json_decode($pages->payment)[0]->opk}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">OMISE_SECRET_KEY Omise<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="osk" name="osk" rows="2" placeholder="OMISE_SECRET_KEY" data-parsley-required="true">{{@json_decode($pages->payment)[0]->osk}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Merchant ID 2C2P<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="merchant_id" name="merchant_id" rows="2" placeholder="Merchant ID" data-parsley-required="true">{{@json_decode($pages->payment)[0]->merchant_id}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Secret Key 2C2P<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="secret_key" name="secret_key" rows="2" placeholder="Secret Key" data-parsley-required="true">{{@json_decode($pages->payment)[0]->secret_key}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Payment URL 2C2P<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="payment_url" name="payment_url" rows="2" placeholder="Payment URL" data-parsley-required="true">{{@json_decode($pages->payment)[0]->payment_url}}</textarea>
								</div>
				        </div>
                        <!-- end panel -->
                    </div>
			</div>
                    