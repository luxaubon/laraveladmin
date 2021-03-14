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
			<form action="" method="get">
				<div class="row">
						<?php 
							$date_stop = !empty($_GET['date_stop']) ?  date('Y-m-d\TH:i:s',strtotime($_GET['date_stop'])) : "";
							$date_start = !empty($_GET['date_start']) ?  date('Y-m-d\TH:i:s',strtotime($_GET['date_start'])) : "";
						?>
					<div class="col-5">
							<label>Date From</label>
							<input  type="datetime-local" class="form-control" id="date_start" name="date_start" value="<?php echo @$date_start; ?>" required>
						</div>

						<div class="col-5">
							<label>Date To</label>
							<input  type="datetime-local" class="form-control" id="date_stop" name="date_stop" value="<?php echo @$date_stop; ?>" required>
						</div>
						<div class="col-2">
							<label>-</label><br>
							<button type="submit" class="btn btn-primary">ค้นหา</button>
					</div>

				</div>
			</form>
			<br>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="widget widget-stats bg-black-lighter">
						<div class="stats-icon"><i class="fa fa-clock"></i></div>
						<div class="stats-info">
							<h4>ยอด Register ทั้งหมด</h4>
							<p>{{$Chart['countUserAll']}}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- begin col-3 -->
				<div class="col-lg-6 col-md-6">
					<div class="widget widget-stats bg-grey-darker">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>ยอด Transaction ทั้งหมด</h4>
							<p>{{$Chart['countCode']}}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
			</div>
			

			<div class="row">

					<div class="col-md-6">
						<div class="panel panel-inverse" data-sortable-id="morris-chart-3">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">ยอด Register แต่ละวัน</h4>
							</div>
							<div class="panel-body">
								<div id="morris-bar-chart" class="height-sm"></div>
							</div>
						</div>
					</div>	

					<div class="col-md-6">
						<div class="panel panel-inverse" data-sortable-id="morris-chart-1">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">ยอด Transaction แต่ละวัน</h4>
							</div>
							<div class="panel-body">
								<div id="morris-bar-chart-Transaction" class="height-sm"></div>
							</div>
						</div>
					</div>

					
				<div class="col-md-6">
					<div class="panel panel-inverse" data-sortable-id="morris-chart-2">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">อาชีพ</h4>
						</div>
						<div class="panel-body">
							<div id="morris-bar-chart-Jobs" class="height-sm"></div>
						</div>
					</div>
				</div> 

				<div class="col-md-6">
					<div class="panel panel-inverse" data-sortable-id="morris-chart-2">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">เงินเดือน</h4>
						</div>
						<div class="panel-body">
							<div id="morris-bar-chart-saraly" class="height-sm"></div>
						</div>
					</div>
				</div> 

				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="flot-chart-5">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">รหัสใต้ฝ่าแต่ละรสชาติ</h4>
						</div>
						<div class="panel-body">
							<div>
								<canvas id="pie-chart" data-render="chart-js"></canvas>
							</div>
						</div>
					</div>
				</div> 

				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="flot-chart-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">อายุ</h4>
						</div>
						<div class="panel-body">
							<div>
								<canvas id="pie-chart2" data-render="chart-js"></canvas>
							</div>
						</div>
					</div>
				</div> 
				

				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="flot-chart-5">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">เพศ</h4>
						</div>
						<div class="panel-body">
							<div>
								<canvas id="pie-chart3" data-render="chart-js"></canvas>
							</div>
						</div>
					</div>
				</div> 


					

				</div>
		
		</div>

@endsection



