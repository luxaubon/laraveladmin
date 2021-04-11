@extends('layouts.head')

@section('content')

<!-- Main Wrapper @s -->
<div class="main-wrapper">
    <div class="main-title">
      <img src="assets_home/img/main-title.png" alt="">
    </div>

    <div class="main-content text-center">
      <h3 class="title">ประเภทร้านค้าชั้นนำ</h3>
      <div class="shop-title">
        <img src="assets_home/img/moderntrade.png" alt="">
      </div>
    <form action="/sendData" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="company" id="status" name="status"  required>
      <div class="main-form">
          
          <div class="form-group">
            <select name="region_id" id="region_id" class="form-control" required>
              <option value="">กรุณาเลือกร้านค้า</option>
                <?php 
                    foreach($region as $region){ 
                        echo '<option value="'.$region->region_id.'">'.$region->shop_name.'</option>';
                    }
                ?>
            </select>
          </div>
        
      </div>

      <div class="upload-reciept">
        <p class="lead">กรุณาอัพโหลดใบเสร็จ</p>

        <div class="upload-file">
          <input type="file" name="files[]" id="file" class="inputfile" accept="image/*" data-multiple-caption="คุณเลือกทั้งหมด {count} ไฟล์"  multiple required />
          <label for="file"><span></span>
            <div><i class="fal fa-camera"></i> กรุณาอัพโหลดใบเสร็จ</div>
          </label>
        </div>

        <div class="row">
          <div class="col-6">
            <a href="#" class="btn btn-block btn-secondary">ยกเลิก</a>
          </div>
          <div class="col-6">
          <button type="submit" class="btn btn-block btn-primary" id="BTN_send">ตกลง</button>
          </div>
        </div>
      </div>
    </form>
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
