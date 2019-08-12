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
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>CONTENT ONLINE</h4>
							<p>{{ $pagesOnline }} </p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-link"></i></div>
						<div class="stats-info">
							<h4>CONTENT OFFLINE</h4>
							<p>{{ $pagesOffline }} </p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-grey-darker">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>Administrator</h4>
							<p>{{ $user }}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-black-lighter">
						<div class="stats-icon"><i class="fa fa-clock"></i></div>
						<div class="stats-info">
							<h4>AVG TIME ON SITE</h4>
							<p>00:12:23</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-lg-6">
					<div class="panel panel-inverse" >
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Calendar</h4>
						</div>
						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
			        <!-- begin panel -->
			        <div class="panel panel-inverse">
			            <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
			                <h4 class="panel-title">Top View Article</h4>
			            </div>
			            <div class="panel-body" data-scrollbar="true" data-height="272px">
							<ul class="feeds">
							 @foreach($pagesView as $db)
								<div class="media">
									<a class="media-left" href="javascript:;">
										<img src="{{ asset('public/images/'.$db->image) }}" alt="" class="media-object">
									</a>
									<div class="media-body">
										<h4 class="media-heading">{{json_decode($db->title)[0]->title_th}}</h4>
										 {{json_decode($db->caption)[0]->caption_th}}<br>
										<!-- Views :  //$db->view  -->
									</div>
								</div>
								@endforeach

							</ul>
			            </div>
			            <div class="panel-footer bg-white clearfix p-15">
                            <a href="javascript:;" class="text-inverse pull-right m-b-2 m-t-2 m-r-5"></a>
			            </div>
			        </div>
			        <!-- end panel -->
			    </div>
			</div>
			<!-- end row -->
			
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="alert alert-success fade show m-b-0">Views Web Site</div>
					<div id="chart"> </div>
					<!-- end panel -->
				</div>
				<!-- end col-8 -->
			</div>


		</div>
		<!-- end #content -->
		<script>
	
        var options = {
            chart: { height: 380,type: 'area',},
            dataLabels: {enabled: false},
            stroke: {curve: 'smooth'},
            series: [{name: 'VIEWS',data: [{{$view}}]},],
			xaxis: {categories: [<?=$montcount;?>],},
            tooltip: {fixed: {enabled: false,position: 'topRight'}}}
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>


@endsection



