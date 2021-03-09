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
                      <?php
                      foreach($pages as $page){
                        echo '<tr>
                                <td>'.json_decode($page->seo)[0]->seo_th.'</td>
                                <td><a href="/rules?show='.$page['id'].'">'.json_decode($page->title)[0]->title_th.'</a></td>
                            </tr>';
                      }?>
                    </tbody>
                </table>
                <?php
                      foreach($pages as $page){
                        if(@$_GET['show'] == $page['id']){
                          echo '<p>'.json_decode($page->caption)[0]->caption_th.'</p>';
                          echo json_decode($page->detail)[0]->detail_th;
                          break;
                        }else if(@$_GET['show'] == null){
                          echo '<p>'.json_decode($page->caption)[0]->caption_th.'</p>';
                          echo json_decode($page->detail)[0]->detail_th;
                          break;
                        }
                      }?>
                

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
