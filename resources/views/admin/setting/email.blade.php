			<div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">E-mail <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="email" name="email" rows="2" placeholder="E-mail" data-parsley-required="true">{{@json_decode($pages->email)[0]->email}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Mailhost <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="host" name="host" rows="2" placeholder="Mailhost" data-parsley-required="true">{{@json_decode($pages->email)[0]->host}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Mailuser <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <textarea class="form-control" id="user" name="user" rows="2" placeholder="Mailuser" data-parsley-required="true">{{@json_decode($pages->email)[0]->user}}</textarea>
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">MailPassword <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <input class="form-control" type="password" id="password" name="password"  placeholder="MailPassword" value="{{@json_decode($pages->email)[0]->password}}">
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">MailPort <span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <input class="form-control" type="text" id="port" name="port" placeholder="MailPort" value="{{@json_decode($pages->email)[0]->port}}">
								</div>
				        </div>
				        <div class="clearfix m-b-20">
	                        <label class="control-label col-sm-2" for="title">Secure<span class="text-danger">*</span></label>
	                        	<div class="col-sm-12">
				                   <input class="form-control" type="text" id="secure" name="secure" placeholder="Secure" value="{{@json_decode($pages->email)[0]->secure}}">
								</div>
				        </div>

                        <!-- end panel -->
                    </div>
			</div>
                    