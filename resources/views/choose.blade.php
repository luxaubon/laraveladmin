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

    <div class="text-center">
      <a href="#" data-toggle="modal" data-target="#rules"  class="btn btn-primary btn-sm">กติกาและของรางวัลกิจกรรม</a>
    </div>
    
    <div class="main-product">
      <img src="assets_home/img/product.png" alt="">
    </div>
  </div>
  <!-- Main Wrapper @e -->


<!-- Rules  @s -->
<div class="modal fade" id="rules" tabindex="-1" role="dialog" aria-labelledby="rules" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">กติกาและของรางวัลกิจกรรม</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $setting['address_en']; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Rules  @e -->

@endsection
