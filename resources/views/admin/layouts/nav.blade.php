<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">

					<li class="has-sub {{ checkActiveMenu(Request::segment(2),'dashboard') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-lg fa-fw m-r-10 fa-tachometer-alt"></i>
						    <span>Dashboard</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(3),'index') }}"><a href="/admin/dashboard/index"><i class="fas fa-home m-r-10 fa-fw"></i> Home</a></li>
							<li class="{{ checkActiveMenu(Request::segment(3),'register') }}"><a href="/admin/dashboard/register"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>List Admin </a></li>
						</ul>
						
					</li>
					

					<li class="has-sub {{ checkActiveMenu(Request::segment(2),'page') }} {{ checkActiveMenu(Request::segment(2),'special') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fab fa-lg fa-fw m-r-10 fa-product-hunt"></i>
						    <span>Activity</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(2),'page') }}"><a href="/admin/page/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>คูปองส่วนลด</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'special') }}"><a href="/admin/special/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>ส่วนลดพิเศษ</span></a></li>
						</ul>
					</li>
					
					<li class="has-sub {{ checkActiveMenu(Request::segment(2),'receipt_wait') }} {{ checkActiveMenu(Request::segment(2),'receipt_app') }}{{ checkActiveMenu(Request::segment(2),'receipt_reject') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fab fa-lg fa-fw m-r-10 fa-product-hunt"></i>
						    <span>Receipt</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(2),'receipt_wait') }}"><a href="/admin/receipt_wait/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Waiting</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'receipt_app') }}"><a href="/admin/receipt_app/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Approved</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'receipt_reject') }}"><a href="/admin/receipt_reject/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Reject</span></a></li>
						</ul>
					</li>
					<li class="{{ checkActiveMenu(Request::segment(2),'member') }}"><a href="/admin/member/index"><i class="fa fa-calendar"></i> <span>Export Member</span></a></li>
					@IF(Auth::id() == 1)
					<li class="{{ checkActiveMenu(Request::segment(2),'export') }}"><a href="/admin/export/index"><i class="fa fa-calendar"></i> <span>Export Group Product</span></a></li>
					<li class="{{ checkActiveMenu(Request::segment(2),'setting') }}"><a href="/admin/setting/index"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>
					@ENDIF

			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
