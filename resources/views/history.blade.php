@extends('layouts.head')

@section('content')
<!-- Main @s -->
<div class="main-wrapper">


<div class="main-bar">
  <div class="main-logo">
    <a href="/"><img src="assets_home/img/Logo.png" alt=""></a>
  </div>
  <div class="main-title">
  <a href="/"><img src="assets_home/img/title.png" alt=""></a>
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
  <div class="main-point">
      <?php if($point > 0){echo '<span class="btn btn-sm btn-primary"><a href="/history" style="color: white;">คะแนนสะสมของคุณ : '.$point.'</a></span>';} ?>
      <span class="btn btn-sm btn-dark">อันดับของคุณ 999</span>
  </div>
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
                                สถานะ
                            </td>
                        </tr>
                        <?php
                        foreach($images_code as $db){

                          $title = $db['code_number'];
                            if($db['status'] == 1){
                                $status = 'รหัสผ่าน';
                            }else if($db['status'] == 2){
                                $status = 'รหัสซ้ำ';
                            }else if($db['status'] == 3){
                                $status = 'รหัสผิดพลาด';
                            }else if($db['status'] == 4){
                              $status = 'ลงทะเบียนโดย Admin';
                              $title = 'ส่งรหัสใต้ฝา';
                            }else if($db['status'] == 5){
                              $status = 'ยกเลิกโดย Admin';
                            }
                            echo '<tr>
                                    <td>'.$title.'</td>
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

<div class="modal fade" id="get-otp" tabindex="-1" role="dialog" aria-labelledby="get-otp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-display">
          <h3 class="title">
            คุณได้รับ <?php if(!empty($history_count)){ echo $history_count;}else{ echo 0; } ?> คะแนน
          </h3>
          <div class="desc" id="modalTextPhone">
          </div>

          <form action="">
            <div class="get-otp">
              <div class="row no-gutters">
                <div class="col-12">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>รหัสใต้ฝา</td>
                            <td>สถานะ</td>
                        </tr>
                        <?php 
                        if(!empty($history)){ 
                          foreach($history as $historys){
                            switch ($historys->status) {
                              case 1: $status = 'รหัสผ่าน'; $color = '#4aff4a;';break;
                              case 2: $status = 'รหัสซ้ำ'; $color = '#ff3838;';break;
                              case 3: $status = 'รหัสผิดพลาด'; $color = '#ff3838;';break;
                              default: $status = 'รหัสผิดพลาด'; $color = '#ff3838;';break;
                            }
                            echo '<tr>
                                  <td>'.$historys->code_number.'</td>
                                  <td style="color: '.$color.'">'.$status.'</td>
                              </tr>';
                          }

                        } ?>

                    </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class="btn btn-block btn-primary" onclick="social_share();" data-toggle="modal">ตกลง</button></div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>


<!-- Main @s  -->
<?php 
if(!empty($history_count)){
  echo "<script>
        $(function () {
          $('#get-otp').modal('toggle');
          
        });
      </script>";
} 
?>
  
@endsection
