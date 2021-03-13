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
  <div class="main-reward">
    <img src="assets_home/img/reward.png" alt="">
  </div>
  <!-- Reward BG @e -->

  <a href="javascript:void(0)" onclick="return social_share();" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s -->


@endsection
