@extends('admin.layouts.head_notable')
        
@section('content')

		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home </a></li>
				<!--li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li-->
				<li class="breadcrumb-item active">{{ ucfirst($folder) }}</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">{{ ucfirst($folder) }}</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-lg-12">
			    	<!-- begin nav-tabs -->

						<ul class="nav nav-tabs">
						<li class="nav-items">
							<a href="#default-tab-1" data-toggle="tab" class="nav-link active">
								<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-address-card"></i> Address</span>
								<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-address-card"></i> Address</span>
							</a>
						</li>
						<li class="nav-items">
							<a href="#default-tab-2" data-toggle="tab" class="nav-link">
								<span class="d-sm-none"><i class="fa fa-envelope"></i> E-mail</span>
								<span class="d-sm-block d-none"><i class="fa fa-envelope"></i> E-mail</span>
							</a>
						</li>
						<li class="nav-items">
							<a href="#default-tab-3" data-toggle="tab" class="nav-link">
								<span class="d-sm-none"><i class="fab fa-lg fa-fw m-r-10 fa-dropbox"></i> Social</span>
								<span class="d-sm-block d-none"><i class="fab fa-lg fa-fw m-r-10 fa-dropbox"></i> Social</span>
							</a>
						</li>

						<li class="nav-items">
							<a href="#default-tab-4" data-toggle="tab" class="nav-link">
								<span class="d-sm-none"><i class="fab fa-lg fa-fw m-r-10 fa-amazon-pay"></i> Payment</span>
								<span class="d-sm-block d-none"><i class="fab fa-lg fa-fw m-r-10 fa-amazon-pay"></i> Payment</span>
							</a>
						</li>
						<li class="nav-items">
							<a href="#default-tab-5" data-toggle="tab" class="nav-link">
								<span class="d-sm-none"><i class="fas fa-cog fa-fw"></i> Setting Web</span>
								<span class="d-sm-block d-none"><i class="fas fa-cog fa-fw"></i> Setting Web</span>
							</a>
						</li>
					</ul>
					<!--div class="search-result-total" style="text-align: right;"><button type="button" id="Save" class="btn btn-success m-t-5">
							 <i class="fa fa-save"></i> Save</button></div-->
							 
						<form method="post" id="upload_form" enctype="multipart/form-data">
							
							<div class="search-result-total" style="text-align: right;">
								<input type="submit" name="upload" id="upload" class="btn btn-success m-t-5" value="Save">
							</div>
						 @csrf
						<div class="tab-content">
							<!-- begin tab-pane -->
							<div class="tab-pane fade active show" id="default-tab-1">
								@include('admin.'.$folder.'.address')
							</div>
							<!-- end tab-pane -->
							<!-- begin tab-pane -->
							<div class="tab-pane fade" id="default-tab-2">
								@include('admin.'.$folder.'.email')
							</div>
							<!-- end tab-pane -->
							<!-- begin tab-pane -->
							<div class="tab-pane fade" id="default-tab-3">
								@include('admin.'.$folder.'.social')
							</div>
							<!-- end tab-pane -->
							<!-- begin tab-pane -->
							<div class="tab-pane fade" id="default-tab-4">
								@include('admin.'.$folder.'.payment')
							</div>
							<!-- end tab-pane -->
							<!-- begin tab-pane -->
							<div class="tab-pane fade" id="default-tab-5">
								 @include('admin.'.$folder.'.setting')
							</div>
							<!-- end tab-pane -->
						</div>
					</form>

					<!-- end tab-content -->
				</div>
			    <!-- end col-6 -->
			</div>
			
			<!-- end row -->
		</div>
 @include('admin.'.$folder.'.js')
		

@endsection
