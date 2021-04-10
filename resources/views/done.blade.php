@extends('layouts.head')

@section('content')

  <!-- Main Wrapper @s -->
  <div class="main-wrapper">
    <div class="main-title">
      <img src="assets_home/img/main-title.png" alt="">
    </div>

    <div class="main-content text-center">
      <div class="main-box">
          <div class="icon"><i class="fas fa-3x fa-check-circle"></i></div>
          <h3 class="title">ขอบคุณที่เข้าร่วมกิจกรรม</h3>
      </div>

      <div class="text-center mt-3">
        <a href="/choose" class="btn btn-sm btn-dark"><i class="fal fa-home"></i> กลับไปหน้าแรก</a>
    </div>
    
    </div>

    <div class="main-product">
      <img src="assets_home/img/product.png" alt="">
    </div>
  </div>
  <!-- Main Wrapper @e -->


@endsection
