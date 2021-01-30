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
      <div class="light-1"><img src="/assets_home/img/light.png" alt=""></div>
      <div class="light-2"><img src="/assets_home/img/light.png" alt=""></div>
      <!-- Light Object Group @e -->

      <!-- Main Logo @s -->
      <div class="main-logo">
        <img src="/assets_home/img/logo.png" alt="">
      </div>
      <!-- Main Logo @e -->

      <!-- Main Title @s -->
      <div class="main-title">
        <img src="/assets_home/img/title.png?v=2" alt="">
      </div>

      <div class="title-desc">
        เมื่อซื้อ รองเท้า ใน Legend series - Kayano, Nimbus, Cumulus และ GT รุ่นใดก็ได้
      </div>
      <!-- Main Title @e -->

      <!-- Shoe Figure @s -->
      <div class="shoeslide-wrapper">
        <div class="shoe-slide">
          <div class="swiper-wrapper">

          @foreach($slides as $db => $sdb)
                @if($sdb)
                <?php 
                    $slide = $sdb['image'];
                    echo '<div class="swiper-slide">
                        <img src="public/images/'.$slide.'" alt="">
                    </div>';
                ?>
                @endif
            @endforeach 
            
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
            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ-นามสกุล">
          </div>
          <div class="form-group">
            <select name="sex" id="sex" class="form-control">
              <option value="">เพศ</option>
              <option value="ชาย">ชาย</option>
              <option value="หญิง">หญิง</option>
            </select>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล์">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
          </div>

          <div class="form-check text-left mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
              ยอมรับ <a href="#" data-toggle="modal" data-target="#terms-conditions">ข้อตกลงและเงื่อนไข</a>
            </label>
          </div>

          <div class="form-group">
            <a href="javascript:void(0);" id="btnCheckData" class="btn btn-primary btn-block">ลงทะเบียน</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Main @e   data-toggle="modal" data-target="#get-otp" -->

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
         <?php echo $setting['address_th']; ?>
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
                <div class="col-6">
                    <button type="button" class="btn btn-block btn-primary" 
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
            disabledElem.removeAttr('disabled')
              .text(originalText);
              clearInterval(interval); 
          }
        }, 1000);
      });
    };

    $(document).ready(function() {
    
         $("#btnCheckData").click(function (){
            
            if($("#name").val() == ''){
                swal("กรุณากรอก ชื่อ-นามสกุล", "", "error");
            }else if($("#sex").val() == ''){
                swal("กรุณาเลือกเพศ", "", "error");
            }else if($("#email").val() == ''){
                swal("กรุณากรอก E-mail", "", "error");
            }else if($("#phone").val() == ''){
                swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
            }else if($("#flexCheckChecked").val() == 'false' || $("#flexCheckChecked").val() == ''){
                swal("กรุณา ยอมรับ ข้อตกลงและเงื่อนไข", "", "error");
            }else{
                $('#get-otp').modal('toggle');
                $("#modalTextPhone").html('ส่งรหัส OTP ไปที่หมายเลข '+ $("#phone").val())
                $("#btnSuccess").prop('disabled', true);
            }
         });

        $('#flexCheckChecked').change(function() {
            if ($(this).is(":checked")) {
                var text =  $(this).val('true')
                console.log(text);
            } else {
                var text = $(this).val('false');
                console.log(text);
            }
        });

        $("#sendOtp").click(function(){
            $('#sendOtp').timedDisable(60);
            $("#Numotp").val(<?php echo rand(10000,999999); ?>);
            var phone  =   $("#phone").val();
            var otp  =   $("#Numotp").val();
            $.ajax({
			   url: "https://o8.sc4msg.com/SendMessage",
			   method: "POST",
			   data: {
                    "ACCOUNT":'<?php echo json_decode($setting->payment)[0]->user; ?>', 
                    "PASSWORD":'<?php echo json_decode($setting->payment)[0]->pass; ?>',
                    "MOBILE":phone,
                    "MESSAGE":'หมายเลข OTP ของท่านคือ ' + otp,
                }
			  });
            swal("ระบบกำลังส่งหมายเลข OTP กรุณารอสักครู่", "", "success");
        });

        $("#otp").keyup(function(){
            var text = $(this).val();
            if(text == $("#Numotp").val()){
                $("#btnSuccess").prop('disabled', false);
            }else{
                $("#btnSuccess").prop('disabled', true);
            }
        });
        
        $("#btnSuccess").click(function(){
            event.preventDefault();
            var name = $("#name").val();
            var sex  =   $("#sex").val();
            var email  =   $("#email").val();
            var phone  =   $("#phone").val();
            var otp  =   $("#Numotp").val();

			$.ajax({
			   url: "/sendOTP",
			   method: "POST",
			   data: {
                   "_token": "{{ csrf_token() }}",
                    "name":name, 
                    "sex":sex,
                    "email":email,
                    "phone":phone,
                    "otp":otp,
                },
				success: function(data){
                    if(data == 'success'){
                        swal("เรียบร้อย", "", "success");
                        
                        setTimeout(function(){ window.location.assign("/choose") }, 2000);
                    }else{
                        swal("กรุณาลองอีกครั้ง", "", "error");
                    }
					
				},
				complete : function(data){

				},
			  })
        });

    });

</script>

@endsection
