@extends('layouts.head')

@section('content')
<!-- Main @s -->
<div class="main-wrapper">
    <div class="main-frame">
      <!-- Frame Corner Group @s -->
      <div class="frame-1"></div>
      <div class="frame-2"></div>
      <div class="frame-3"></div>
      <div class="frame-4"></div>
      <!-- Frame Corner Group @e -->

      <!-- Light Object Group @s -->
      <div class="light-1"><img src="assets/img/light.png" alt=""></div>
      <div class="light-2"><img src="assets/img/light.png" alt=""></div>
      <!-- Light Object Group @e -->

      <!-- Main Logo @s -->
      <div class="main-logo">
        <img src="assets/img/logo.png" alt="">
      </div>
      <!-- Main Logo @e -->

      <!-- Main Title @s -->
      <div class="main-title">
        <img src="assets/img/title.png?v=2" alt="">
      </div>

      <div class="title-desc">
        เมื่อซื้อ รองเท้า ใน Legend series - Kayano, Nimbus, Cumulus และ GT รุ่นใดก็ได้
      </div>
      <!-- Main Title @e -->

      <!-- Shoe Figure @s -->
      <div class="shoeslide-wrapper">
        <div class="shoe-slide">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="assets/img/shoe-1.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="assets/img/shoe-2.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="assets/img/shoe-3.png" alt="">
            </div>
            <div class="swiper-slide">
              <img src="assets/img/shoe-4.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <!-- Shoe Figure @e -->

      <div class="heading-title">
        <h2 class="title">ลงทะเบียนรับอั่งเปา</h2>
      </div>

      <div class="register-form">
        <form action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล">
          </div>
          <div class="form-group">
            <select name="" id="" class="form-control">
              <option value="">เพศ</option>
              <option value="">ชาย</option>
              <option value="">หญิง</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="อีเมล์">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์">
          </div>

          <div class="form-check text-left mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
              ยอมรับ <a href="#" data-toggle="modal" data-target="#terms-conditions">ข้อตกลงและเงื่อนไข</a>
            </label>
          </div>

          <div class="form-group">
            <a href="#" data-toggle="modal" data-target="#get-otp" class="btn btn-primary btn-block">ลงทะเบียน</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Main @e -->

  <!-- Terms & Conditions Modal  @s -->
  <div class="modal fade" id="terms-conditions" tabindex="-1" role="dialog" aria-labelledby="terms-conditions"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ข้อตกลงและเงื่อนไข</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum
          sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
          nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
          aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
          dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
          vulputate eleifend tellus.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Terms & Conditions Modal  @e -->

  <!-- Get OTP Modal @s -->
  <div class="modal fade" id="get-otp" tabindex="-1" role="dialog" aria-labelledby="get-otp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content -chinese-bg">
        <div class="modal-body">
          <div class="modal-display">
            <i class="fas fa-mobile"></i>
            <h3 class="title">
              รับรหัส OTP
            </h3>
            <div class="desc">
              ส่งรหัส OTP ไปที่หมายเลข 083 060 3262
            </div>

            <form action="">
              <div class="get-otp">
                <div class="row no-gutters">
                  <div class="col-7"><input type="number" class="form-control"></div>
                  <div class="col-5"><button class="btn btn-block btn-primary">รับรหัส OTP</button></div>
                </div>
              </div>

              <div class="row">
                <div class="col-6"><button type="button" class="btn btn-block btn-secondary"
                    data-dismiss="modal">ยกเลิก</button></div>
                <div class="col-6"><button type="button" class="btn btn-block btn-primary" data-dismiss="modal"
                    data-target="#submit-success" data-toggle="modal">ตกลง</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
