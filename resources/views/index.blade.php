@extends('layouts.head')

@section('content')
<!-- Main @s -->
<div class="main-wrapper">

<!-- Main Bar @s  -->
<div class="main-bar">
  <div class="main-logo">
    <img src="assets_home/img/Logo.png" alt="">
  </div>
  <div class="main-title">
    <img src="assets_home/img/title.png" alt="">
  </div>
</div>
<!-- Main Bar @e -->
<!-- Home Slide @s -->
<div class="homeslide-wrapper">
  <div class="home-slide">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
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
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

  </div>
</div>
<!-- Home Slide @e -->

<!-- Content Wrapper @s -->
<div class="content-wrapper">
  <!-- Main Button @s -->
  <div class="main-button">
    <a href="#" class="btn">
      <i class="fal fa-file"></i>
      <div>กติกา</div>
    </a>
    <a href="#" class="btn">
      <i class="fal fa-trophy"></i>
      <div>ประกาศผล</div>
    </a>
    <a href="#" class="btn btn-primary">
      <i class="fal fa-star"></i>
      <div>TOP SPENDER</div>
    </a>
  </div>
  <!-- Main Button @s -->

  <!-- Main Box @s -->
  <div class="main-box">

    <div class="main-mobile">
      <form action="">
        <div class="form-group">
          <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10">
        </div>
        <div class="form-group">
          <a  href="javascript:void(0);" id="btnCheckData" class="btn btn-block btn-lg btn-primary" >ตกลง</a>

        </div>
      </form>
    </div>
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

<!-- Get OTP Modal @s -->
<div class="modal fade" id="get-otp" tabindex="-1" role="dialog" aria-labelledby="get-otp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-display">
          <i class="fas fa-mobile"></i>
          <h3 class="title">
            รับรหัส OTP
          </h3>
          <div class="desc" id="modalTextPhone">
          </div>

          <form action="">
            <div class="get-otp">
              <div class="row no-gutters">
                    
                <div class="col-7">
                    <input type="number" id="otp" name="otp" class="form-control">
                    <input type="hidden" id="Numotp" name="Numotp" class="form-control" >
                </div>
                <div class="col-5">
                  <button type="button" class="btn btn-block btn-primary" id="sendOtp">รับรหัส OTP </button>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6"><button type="button" class="btn btn-block btn-secondary"
                  data-dismiss="modal">ยกเลิก</button></div>
              <div class="col-6"><button type="button" class="btn btn-block btn-primary" 
                    id="btnSuccess"
                   data-toggle="modal">ตกลง</button></div>
            </div>

          </form>


        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $.fn.timedDisable = function(time) {
      if (time == null) {
        time = 5;
      }
      var seconds = Math.ceil(time); // Calculate the number of seconds
      return $(this).each(function() {
        $(this).attr('disabled', 'disabled');
        var disabledElem = $(this);
        var originalText = this.innerHTML;
        disabledElem.text(originalText + ' (' + seconds + ')');
        var interval = setInterval(function() {
        	seconds = seconds - 1;
          disabledElem.text(originalText + ' (' + seconds + ')');
          if (seconds === 0) { 
            disabledElem.removeAttr('disabled').text(originalText);
            clearInterval(interval); 
          }
        }, 1000);
      });
    };

$(document).ready(function() {
      

      $("#btnCheckData").click(function (){
        if($("#phone").val() == '' || $("#phone").val().length !== 10){
             swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
         }else{
             $('#get-otp').modal('toggle');
             $("#modalTextPhone").html('ส่งรหัส OTP ไปที่หมายเลข '+ $("#phone").val())
         }
      });

      $("#sendOtp").click( function(){
            $('#sendOtp').timedDisable(60);
            $("#Numotp").val(<?php echo rand(10000,999999); ?>);
            var phone  =   $("#phone").val();
            var otp  =   $("#Numotp").val();
            // $.ajax({
            //     url: "/OTP",
            //     method: "GET",
            //     success: function(data){
            //       if(data){
            //         $.ajax({
            //           url: "https://o8.sc4msg.com/SendMessage",
            //           method: "POST",
            //           data: {
            //                 "ACCOUNT":data.user, 
            //                 "PASSWORD":data.pass,
            //                 "MOBILE":phone,
            //                 "MESSAGE":'หมายเลข OTP ของท่านคือ ' + otp,
            //             }
            //         });
            //         swal("ระบบกำลังส่งหมายเลข OTP กรุณารอสักครู่", "", "success");
            //       }else{
            //         swal("ระบบไม่สามารถส่ง OTP กรุณาลองอีกครั้ง", "", "error");
            //       }
            //     }
            //   });
        });

        $("#btnSuccess").click(function (){
            event.preventDefault();
            var phone  =   $("#phone").val();
            var otp  =   $("#Numotp").val();
            var textOTP  =   $("#otp").val();

            $("#btnSuccess").prop('disabled', true);

            if(textOTP === otp && (textOTP) && (otp)){
              // $.ajax({
              //   url: "/sendOTP",
              //   method: "POST",
              //   data: {
              //       "_token": "{{ csrf_token() }}",
              //         "name":name, 
              //         "sex":sex,
              //         "email":email,
              //         "phone":phone,
              //         "otp":otp,
              //     },
              //     success: function(data){
              //       if(data == 'success'){
              //           swal("บันทึกข้อมูลเรียบร้อย", "", "success");
              //           setTimeout(function(){ window.location.assign("/choose") }, 2000);
              //       }else if(data == 'sameotp'){
              //         swal("OTP และ เบอร์โทรศัพท์มีการลงทะเบียนแล้ว", "", "error");
              //       }else{
              //           swal("กรุณาลองอีกครั้ง", "", "error");
              //       }
              //     },
              //     complete : function(data){
                    
              //     },
              // })
            }else{
              swal("กรุณากรอกรหัส OTP ที่ท่านได้รับ", "", "error");
              $("#btnSuccess").prop('disabled', false);
            }

            
        });


});
</script>

@endsection
