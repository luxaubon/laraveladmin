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

					<li class="{{ checkActiveMenu(Request::segment(2),'page') }}"><a href="/admin/page/index"><i class="fa fa-calendar"></i> <span>Rules</span></a></li>
					<!-- <li class="{{ checkActiveMenu(Request::segment(2),'shopcode') }}"><a href="/admin/shopcode/index"><i class="fa fa-calendar"></i> <span>Shop Code</span></a></li> -->
					<li class="{{ checkActiveMenu(Request::segment(2),'slide') }}"><a href="/admin/slide/index"><i class="far fa-lg fa-fw m-r-10 fa-image"></i> <span>Slide</span></a></li>
					<li class="{{ checkActiveMenu(Request::segment(2),'member') }}"><a href="/admin/member/index"><i class="far fa-lg fa-fw m-r-10 fa-user"></i> <span>Member</span></a></li>

					<!-- <li class="has-sub {{ checkActiveMenu(Request::segment(2),'trees') }}{{ checkActiveMenu(Request::segment(2),'products') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fab fa-lg fa-fw m-r-10 fa-product-hunt"></i>
						    <span>Product</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(2),'trees') }}"><a href="/admin/trees/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Menus Product</span></a></li>

							<li class="{{ checkActiveMenu(Request::segment(2),'products') }}"><a href="/admin/products/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Products</span></a></li>
						</ul>
					</li> -->
					
					<li class="{{ checkActiveMenu(Request::segment(2),'setting') }}"><a href="/admin/setting/index"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>


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
