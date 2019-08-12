@extends('admin.layouts.head')
        
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
			    	@php
			    		if(count($errors)){
			    			$ltab = '';
			    			$lshow1 = 'active show';
			    			$lshow2 = '';
			    			$ftab = 'active';
			    		}else{
			    			$ltab = 'active';
			    			$lshow1 = '';
			    			$lshow2 = 'active show';
			    			$ftab = '';
			    		}
			    	@endphp

			    	@if ($pages_id == '')

			    		
						<ul class="nav nav-tabs">
							<li class="nav-items">
								<a href="#default-tab-1" data-toggle="tab" class="nav-link <?php echo $ltab; ?>">
									<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-list-ul"></i> LIST DATA</span>
									<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-list-ul"></i> LIST DATA</span>
								</a>
							</li>
							<li class="nav-items">
								<a href="#default-tab-2" data-toggle="tab" class="nav-link <?php echo $ftab; ?>">
									<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i> FROM DATA</span>
									<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i> FROM DATA</span>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade {{$lshow2}}" id="default-tab-1">
								@include('admin.'.$folder.'.listdata')
							</div>
							<div class="tab-pane fade {{$lshow1}}" id="default-tab-2">
								<form method="POST" action="/admin/{{$folder}}/insert" enctype="multipart/form-data">
									@csrf
										@include('admin.'.$folder.'.form')
								</form>
							</div>
						</div>
					@else
						<ul class="nav nav-tabs">
							<li class="nav-items">
								<a href="#default-tab-1" data-toggle="tab" class="nav-link ">
									<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-list-ul"></i> LIST DATA</span>
									<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-list-ul"></i> LIST DATA</span>
								</a>
							</li>
							<li class="nav-items"> 
								<a href="#default-tab-2" data-toggle="tab" class="nav-link active">
									<span class="d-sm-none"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i> FROM DATA</span>
									<span class="d-sm-block d-none"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i> FROM DATA</span>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade " id="default-tab-1">
								@include('admin.'.$folder.'.listdata')
							</div>
							<div class="tab-pane fade active show" id="default-tab-2">
								<form method="POST" action="/admin/{{$folder}}/edit/{{$pages_id->id}}" enctype="multipart/form-data">
									<input type="hidden" name="editID" id="editID" value="{{$pages_id->id}}" >
									@csrf
										@include('admin.'.$folder.'.edit')
								</form>
							</div>
						</div>
					@endif
					<!-- end tab-content -->
				</div>
			    <!-- end col-6 -->
			</div>
			
			<!-- end row -->
		</div>
 @include('admin.'.$folder.'.js')
		

@endsection
