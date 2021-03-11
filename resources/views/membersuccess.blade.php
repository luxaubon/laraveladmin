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
    <a href="/rules" class="btn">
      <i class="fal fa-file"></i>
      <div>กติกา</div>
    </a>
    <a href="/results" class="btn">
      <i class="fal fa-trophy"></i>
      <div>ประกาศผล</div>
    </a>
    <?php if($toppender_status == 'online'){
        echo '<a href="/toppender" class="btn btn-primary">
            <i class="fal fa-star"></i>
            <div>TOP SPENDER</div>
        </a>';
    }?>
  </div>


  <!-- Main Box @s -->

  <div class="main-box">
                <h2 class="title">ประวัติย้อนหลัง</h2>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>
                                รหัสใต้ฝา
                            </td>
                            <td>
                                สถาณะ
                            </td>
                        </tr>
                        <?php
                        foreach($images_code as $db){
                            if($db['status'] == 1){
                                $status = 'ผ่าน';
                            }else if($db['status'] == 2){
                                $status = 'รหัสซ้ำ';
                            }else{
                                $status = 'รหัสผิดพลาด';
                            }
                            echo '<tr>
                                    <td>'.$db['code_number'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                        }?>

                        <tr >
                            <td colspan="2">
                            {{ $images_code->links() }}
                            </td>
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

  <a href="javascript:void(0)" onclick="return social_share();" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s  -->
<?php if(@$_GET['share'] == 'share'){ ?>
<script>

$(function () {
    social_share();
});


    </script>
<?php } ?>
@endsection
