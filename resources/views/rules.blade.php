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
    <a href="/rules" class="btn">
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
                <h2 class="title">ประกาศรายชื่อผู้โชคดี</h2>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>
                                รอบการร่วมสนุก
                            </td>
                            <td>
                                การจับรางวัล
                            </td>
                        </tr>

                        <tr>
                            <td>01 - 30 เม.ย. 64</td>
                            <td><a href="#">6 พ.ค. 64</a></td>
                        </tr>

                        <tr>
                            <td>01 - 31 พ.ค. 64</td>
                            <td><a href="#">2 มิ.ย. 64</a></td>
                        </tr>

                        <tr>
                            <td>01 - 30 มิ.ย. 64</td>
                            <td><a href="#">7 ก.ค. 64</a></td>
                        </tr>

                        <tr>
                            <td>01 - 31 ก.ค. 64</td>
                            <td><a href="#">4 ส.ค. 64</a></td>
                        </tr>

                        <tr>
                            <td>01 - 31 ส.ค. 64</td>
                            <td><a href="#">9 ก.ย. 64</a></td>
                        </tr>

                        <tr>
                            <td>1 เม.ย. 64 - 31 ส.ค. 64</td>
                            <td><a href="#">9 ก.ย. 64</a></td>
                        </tr>

                    </tbody>
                </table>
                <p>รางวัลสร้อยคอทองคำ รอบวันที่ 01 - 31 พฤษภาคม 2564</p>
                <table class="table table-sm table-striped">
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>นายชิงโชค รางวัล</td>
                            <td>081 123 XXXX</td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>นายชิงโชค รางวัล</td>
                            <td>081 123 XXXX</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>นายชิงโชค รางวัล</td>
                            <td>081 123 XXXX</td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>นายชิงโชค รางวัล</td>
                            <td>081 123 XXXX</td>
                        </tr>
                    </tbody>
                </table>

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
