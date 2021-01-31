<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Administration</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ==================
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="/assets/css/default/style.min.css" rel="stylesheet" />
	<link href="/assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<link href="/assets/css/style.css" rel="stylesheet" />
	<link href="/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="/assets/css/default/style.min.css" rel="stylesheet" />
	<link href="/assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />

   	<link href="/assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

    <link href="/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/assets/plugins/pace/pace.min.js"></script>
	<script src="/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== PLUGIN ================== -->
	<link href="/assets/plugins/morris/morris.css" rel="stylesheet" />
	<link href="/assets/css/style.css" rel="stylesheet" />
	<link href="/assets/charts/styles.css" rel="stylesheet" />
	<script src="/assets/charts/apexcharts.min.js"></script>
	


</head>
<body>
		<!-- begin #page-loader -->
	<div id="postdataload" ></div>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		
	@include('admin.layouts.heard')
	@include('admin.layouts.nav')

	@yield('content')
	
	@include('admin.layouts.footer_chart')
	
