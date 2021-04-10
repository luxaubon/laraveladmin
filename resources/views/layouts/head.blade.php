
<?php 

@$titleFBMain =   json_decode($setting->seo)[0]->title;
@$captionFBMain = json_decode($setting->seo)[0]->keyword;
@$descFBMain =  json_decode($setting->seo)[0]->description;

@$titleFB =  json_decode($setting->seo)[0]->title;
@$DescFB =  json_decode($setting->seo)[0]->description;
@$fb_id = json_decode($setting->seo)[0]->fb_id;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?=$titleFBMain;?></title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="keywords" content="<?=$captionFBMain;?>" />
  <meta name="description" content="<?=$descFBMain;?>" />
  
  <link rel="icon" href="{{ asset('public/images/'.$setting->image) }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('public/images/'.$setting->image) }}" type="image/x-icon" />

  <meta property="og:site_name" content="<?=$titleFB;?>" />
  <meta property="article:publisher" content="<?php echo url('');?>" />
  <meta property="article:author" content="<?php echo url('');?>" />

  <meta property="fb:app_id" content="<?=$fb_id;?>">
  <meta property="fb:pages" content="<?=$fb_id;?>" />
  <meta property="og:url" content="<?php echo url('');?>" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?=$titleFB;?>" />
  <meta property="og:description" content="<?=$DescFB;?>" />
  <meta property="og:image" content="{{ asset('public/images/'.$setting->imagefb) }}" />
  <meta property="og:image:secure_url" content="{{ asset('public/images/'.$setting->imagefb) }}" />
  <meta property="og:image:type" content="image/jpeg" />
  <link rel="image_src" href="{{ asset('public/images/'.$setting->imagefb) }}" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@<?=$titleFBMain;?>" />
  <meta name="twitter:creator" content="@<?=$titleFBMain;?>" />
  <meta property="og:url" content="<?php echo url('');?>" />
  <meta property="og:title" content="<?=$titleFB;?>" />
  <meta property="og:description" content="<?=$DescFB;?>" />
  <meta property="og:image" content="{{ asset('public/images/'.$setting->imagefb) }}" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets_home/css/style.css?v=5">
  <script src="/assets_home/js/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="/jquery.Thailand.js/dist/jquery.Thailand.min.css">

  <!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->

  <!-- <link rel="stylesheet" href="/assets_home/datepicker/css/mobiscroll.jquery.min.css">
  <script src="/assets_home/datepicker/js/mobiscroll.jquery.min.js"></script> -->



</head>

<body>
<?php if(Session::get('ss_id')){ echo '<div class="profile-button"><a href="/profile"><i class="fas fa-user"></i></a></div>'; } ?>


@yield('content')

@include('layouts.footer')