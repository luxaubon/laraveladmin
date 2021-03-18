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
        echo '<a href="/toppender" class="btn">
            <i class="fal fa-star"></i>
            <div>TOP SPENDER</div>
        </a>';
    }?>
  </div>


  <!-- Main Box @s -->
  <div class="main-box">
    <div class="main-mobile">
      <form action="">
        <div class="form-group">
        <h4>กรุณากรอกเบอร์โทรศัพท์</h4>
          <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10">
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-block btn-lg btn-primary" id="btnCheckData">ตกลง</button>
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

  <a href="javascript:void(0)" onclick="return social_share();" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
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
                    <input type="text" id="Numotp" name="Numotp" class="form-control" >
                    
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
        event.preventDefault();
        $("#btnCheckData").prop('disabled', true);

        if($("#phone").val() == '' || $("#phone").val().length !== 10){
             swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
             $("#btnCheckData").prop('disabled', false);
         }else{
              var phone   =   $("#phone").val();
              $.ajax({
                  url: "/login?phone="+phone,
                  method: "GET",
                  success: function(data){
                    if(data == 'loginsuccess'){
                      window.location.href = '/member'
                    }else{
                      $('#get-otp').modal('toggle');
                      $("#modalTextPhone").html('ส่งรหัส OTP ไปที่หมายเลข '+ $("#phone").val())
                      $("#btnCheckData").prop('disabled', false);
                    }

                  }
              });

            
         }
      });

      $("#sendOtp").click( function(){
            $('#sendOtp').timedDisable(180);
            $("#Numotp").val(<?php echo rand(10000,999999); ?>);
            var phone   =   $("#phone").val();
            var otp     =   $("#Numotp").val();
            $.ajax({
                url: "/OTP?phone="+phone+"&otp="+otp,
                method: "GET",
                success: function(data){
                  if(data == 'registerDont'){
                    window.location.href = '/member'
                  }else{
                      swal("ระบบกำลังส่งหมายเลข OTP กรุณารอสักครู่", "", "success");
                  }

                 }
            });
        });

        $("#btnSuccess").click(function (){
            event.preventDefault();
            var phone  =   $("#phone").val();
            var otp  =   $("#Numotp").val();
            var textOTP  =   $("#otp").val();

            $("#btnSuccess").prop('disabled', true);

            if(textOTP === otp && (textOTP) && (otp)){
              window.location.href = '/register'
            }else{
              swal("กรุณากรอกรหัส OTP ที่ท่านได้รับ", "", "error");
              $("#btnSuccess").prop('disabled', false);
            }

            
        });


});
</script>

@endsection
