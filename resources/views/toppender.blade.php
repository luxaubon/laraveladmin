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
    
    <?php if($point > 0){echo '<span class="btn btn-sm btn-primary"><a href="/history" style="color: white;">สิทธิ์สะสมของคุณ : '.$point.'</a></span>';} ?>
      <!-- <span class="btn btn-sm btn-dark">อันดับของคุณ 999</span> -->
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

    <!-- Countdown Timer @s -->
    
    <div class="countdown-timer">
        <div class="countdown-clock">
          <div id="countdown-clock"></div>
            <div class="countdownclock-title">
                <div>วัน</div>
                <div>ชั่วโมง</div>
                <div>นาที</div>
                <div>วินาที</div>
            </div>
        </div>
      </div>
    <!-- Countdown Timer @e -->

  <!-- Main Box @s -->
  <div class="main-box">
                <h2 class="title">ประกาศรายชื่อผู้โชคดี <br>Top Spender</h2>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>No.</td>
                            <td>ชื่อ - นามสกุล</td>
                            <td>เบอร์</td>
                            <td>Point</td>
                        </tr>

                        <?php 
                          if($user == 'nodata'){
                            echo '<tr>
                                    <th colspan="4">ไม่มีข้อมูล</th>
                                </tr>';
                          }else{
                            $i = 1;
                            foreach($user as $db){
                            $last_name = substr($db->last_name, 0, -3);
                            $phone = substr($db->phone, 0, -4);
                            echo '<tr>
                                    <th>'.$i++.'</th>
                                    <th>'.$db->name.' - '.$last_name.'XXX</th>
                                    <th>'.$phone.'XXXX</th>
                                    <th>XX</th>
                                </tr>';
                             
                            }
                          }
                            
                            ?>

                    </tbody>
                    

                </table>
                <?php if(!empty($myuser[0]->totals)){ ?>
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td><?php echo $myuser[0]->name; ?> - <?php echo $myuser[0]->last_name; ?></td>
                                <td><?php echo $myuser[0]->phone; ?></td>
                                <td><?php echo $myuser[0]->totals; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                

            </div>

  <!-- Main Box @e -->

  <!-- Reward BG @s -->
  <div class="bottom-button">
      <a href="/" class="btn btn-sm btn-dark"><i class="fal fa-angle-left"></i> ไปหน้าหลัก</a>
      <a href="/toppender" class="btn btn-sm btn-dark"><i class="fal fa-redo-alt"></i> รีเฟรช</a>
  </div>

  <div class="main-reward">
    <img src="assets_home/img/reward.png" alt="">
  </div>
  <!-- Reward BG @e -->

  <a href="https://www.facebook.com/HiVitaminC200" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s -->
<script>

var countDownDate = new Date("<?php echo DateEng($date_stop);?>").getTime();
  if(countDownDate < Math.floor(Date.now() / 1000)*1000){
    window.location.assign("/")
  }
  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("countdown-clock").innerHTML = "<div>" + days + "</div><div>" + hours + "</div><div>" +  minutes + "</div><div>" + seconds + "</div>";
    if (distance < 0) {
      clearInterval(x);
      
    }
  }, 1000);


</script>

@endsection
