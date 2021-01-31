@extends('admin.layouts.head_chart')
        
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
				<div class="col-lg-4 col-md-6">
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
				<div class="col-lg-4 col-md-6">
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
				<div class="col-lg-4 col-md-6">
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
			<br>

			 <!-- begin row -->
			 <div class="row">
				<!-- begin col-6 -->
			    <div class="col-md-6">
			    	<!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="flot-chart-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จำนวนผู้ที่ได้ส่วนลด</h4>
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="pie-chart" data-render="chart-js"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
		        </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->
                <div class="col-lg-6">
			    	<!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จำนวนผู้ลงทะเบียนทั้งหมด</h4>
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="bar-chart" data-render="chart-js"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
</div>

			<!-- begin row -->
		    <div class="row">
		        <!-- begin col-6 -->
		        <div class="col-md-6">
			    	<!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="morris-chart-3">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จำนวนผู้เล่นกิจกรรมแต่ละวัน</h4>
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart" class="height-sm"></div>
                        </div>
                    </div>
                    <!-- end panel -->
		        </div>
		        <!-- end col-6 -->
		        <!-- begin col-6 -->
		        <div class="col-md-6">
			    	<!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="chart-js-6">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">จำนวนผู้เล่นกิจกรรม แต่ละสาขา</h4>
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="doughnut-chart" data-render="chart-js"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
		        </div>
		        <!-- end col-6 -->
		    </div>
			<!-- end row -->
			

			



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



