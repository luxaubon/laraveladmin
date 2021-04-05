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
					<li class="has-sub {{ checkActiveMenu(Request::segment(2),'toprank1') }}{{ checkActiveMenu(Request::segment(2),'toprank2') }}{{ checkActiveMenu(Request::segment(2),'toprank3') }}{{ checkActiveMenu(Request::segment(2),'toprank') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fab fa-lg fa-fw m-r-10 fa-product-hunt"></i>
						    <span>TopRank</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(2),'toprank') }}"><a href="/admin/toprank/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Every taste</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'toprank1') }}"><a href="/admin/toprank1/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Lemon</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'toprank2') }}"><a href="/admin/toprank2/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Orange</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'toprank3') }}"><a href="/admin/toprank3/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>MixBerry</span></a></li>
						</ul>
					</li>

					<li class="has-sub {{ checkActiveMenu(Request::segment(2),'member') }}{{ checkActiveMenu(Request::segment(2),'member1') }}{{ checkActiveMenu(Request::segment(2),'member2') }}{{ checkActiveMenu(Request::segment(2),'member3') }}">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fab fa-lg fa-fw m-r-10 fa-product-hunt"></i>
						    <span>Code</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ checkActiveMenu(Request::segment(2),'member') }}"><a href="/admin/member/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>All Status</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'member1') }}"><a href="/admin/member1/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Pass code</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'member2') }}"><a href="/admin/member2/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Duplicate code</span></a></li>
							<li class="{{ checkActiveMenu(Request::segment(2),'member3') }}"><a href="/admin/member3/index"><i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i> <span>Wrong code</span></a></li>
						</ul>
					</li>
					<li class="{{ checkActiveMenu(Request::segment(2),'user') }}"><a href="/admin/user/index"><i class="fa fa-calendar"></i> <span>Member</span></a></li>

					<li class="{{ checkActiveMenu(Request::segment(2),'page') }}"><a href="/admin/page/index"><i class="fa fa-calendar"></i> <span>Results</span></a></li>
					<li class="{{ checkActiveMenu(Request::segment(2),'toppender') }}"><a href="/admin/toppender/index"><i class="fa fa-calendar"></i> <span>Toppender</span></a></li>
					
					<li class="{{ checkActiveMenu(Request::segment(2),'slide') }}"><a href="/admin/slide/index"><i class="far fa-lg fa-fw m-r-10 fa-image"></i> <span>Slide</span></a></li>
					<!-- <li class="{{ checkActiveMenu(Request::segment(2),'member') }}"><a href="/admin/member/index"><i class="far fa-lg fa-fw m-r-10 fa-user"></i> <span>Member</span></a></li> -->

					

					@IF(Auth::id() == 1)
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
