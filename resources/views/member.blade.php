@extends('layouts.head')

@section('content')
<!-- Main @s -->
<div class="main-wrapper">


<div class="main-bar">
  <div class="main-logo">
    <img src="assets_home/img/Logo.png" alt="">
  </div>
  <div class="main-title">
    <img src="assets_home/img/title.png" alt="">
  </div>
</div>

<div class="homeslide-wrapper">
  <div class="home-slide">
    <div class="swiper-wrapper">
      @foreach($slides as $db => $sdb)
          @if($sdb)
          <?php 
              $slide = $sdb['image'];
              $link = ($sdb['link']) ? $sdb['link'] : 'javascript:void(0);';
              echo '<div class="swiper-slide">
                      <a href="'.$sdb['link'].'"><img src="public/images/'.$slide.'" alt=""></a>
                  </div>';
          ?>
          @endif
      @endforeach 
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<!-- Content Wrapper @s -->
<div class="content-wrapper">

  <div class="main-button">
    <a href="#" class="btn">
      <i class="fal fa-file"></i>
      <div>กติกา</div>
    </a>
    <a href="#" class="btn">
      <i class="fal fa-trophy"></i>
      <div>ประกาศผล</div>
    </a>
    <a href="#" class="btn btn-primary">
      <i class="fal fa-star"></i>
      <div>TOP SPENDER</div>
    </a>
  </div>


  <!-- Main Box @s -->
  <div class="main-box">
    <h2 class="title">กรุณาใส่ CODE</h2>
    <div class="main-mobile">
        <form action="">
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="กรุณาใส่ CODE">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fal fa-camera"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="กรุณาใส่ CODE">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fal fa-camera"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="กรุณาใส่ CODE">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fal fa-camera"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="btn btn-block">+ เพิ่มช่อง</div>
            </div>

            <div class="form-group">
                <a href="#" class="btn btn-block btn-lg btn-primary">ตกลง</a>
            </div>

            
        </form>
    </div>
    </div>

  <!-- Main Box @e -->

  <!-- Reward BG @s -->
  <div class="main-reward">
    <img src="assets_home/img/reward.png" alt="">
  </div>
  <!-- Reward BG @e -->

  <a href="#" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s -->


@endsection
