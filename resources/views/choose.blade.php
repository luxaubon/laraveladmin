@extends('layouts.head')

@section('content')

<!-- Main Wrapper @s -->
<div class="main-wrapper">
    <div class="main-title">
      <img src="assets_home/img/main-title.png" alt="">
    </div>

    <div class="text-center">
    Call center : 095-892-1436<br>
(ทุกวัน 08.30-17.30)
    </div>

    <div class="main-content text-center">
      <h3 class="title">กรุณาเลือกประเภทร้านค้า</h3>

      <div class="shop-type">
          <a href="/moderntrade">
              <img src="assets_home/img/moderntrade.png" alt="">
          </a>
          <a href="/dealer">
            <img src="assets_home/img/dealer.png" alt="">
        </a>
      </div>
    </div>

    <div class="main-product">
      <img src="assets_home/img/product.png" alt="">
    </div>
  </div>
  <!-- Main Wrapper @e -->


@endsection
