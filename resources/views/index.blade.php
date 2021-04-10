@extends('layouts.head')

@section('content')

<div class="main-wrapper">
    <div class="main-title">
      <img src="assets_home/img/main-title.png" alt="">
    </div>

    <div class="main-content text-center">
      <h3 class="title">กรุณาลงทะเบียน</h3>

      <div class="main-form">
        <form action="">
          <div class="form-group">
            <input type="hidden" value="<?php echo @$line_id; ?>" id="token_line">
            <input type="text" class="form-control" placeholder="ชื่อ" id="name" name="name" onkeyup="isThaichar(this.value,this)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="นามสกุล" id="last_name" onkeyup="isThaichar(this.value,this)" name="last_name">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" placeholder="เบอร์โทรศัพท์" id="phone" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10">
          </div>

          <div class="form-check text-left mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
              ยอมรับ <a href="#" data-toggle="modal"
                data-target="#terms-conditions">ข้อตกลงและเงื่อนไขการร่วมกิจกรรม</a>
            </label>
          </div>

          <div class="form-check text-left mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked_2">
            <label class="form-check-label" for="flexCheckChecked_2">
              ยอมรับ <a href="#" data-toggle="modal" data-target="#rules">กติกาและของรางวัลกิจกรรม</a>
            </label>
          </div>

          <div class="form-group">
            <button type="button" class="btn btn-block btn-lg btn-primary" id="btnCheckData">ลงทะเบียน</button>
          </div>

        </form>
      </div>
    </div>

    <div class="main-product">
      <img src="assets_home/img/product.png" alt="">
    </div>
  </div>
  <!-- Main Wrapper @e -->


  <!-- Terms & Conditions Modal  @s -->
  <div class="modal fade" id="terms-conditions" tabindex="-1" role="dialog" aria-labelledby="terms-conditions"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ข้อตกลงและเงื่อนไขการร่วมกิจกรรม</h5>
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

  <script type="text/javascript">

  function isThaichar(str,obj){
      var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ";
      var str_length=str.length;
      var str_length_end=str_length-1;
      var isThai=true;
      var Char_At="";
      for(i=0;i<str_length;i++){
          Char_At=str.charAt(i);
          if(orgi_text.indexOf(Char_At)==-1){
              isThai=false;
          }   
      }
      if(str_length>=1){
          if(isThai==false){
              obj.value=str.substr(0,str_length_end);
          }
      }
      return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
  }

$(document).ready(function() {

    $('#flexCheckChecked').change(function() {
      if ($(this).is(":checked")) {
          var text =  $(this).val('true')
          $('#terms-conditions').modal('toggle');
      } else {
          var text = $(this).val('false');
      }
    });
    
    $('#flexCheckChecked_2').change(function() {
      if ($(this).is(":checked")) {
          var text =  $(this).val('true')
          $('#rules').modal('toggle');
      } else {
          var text = $(this).val('false');
      }
    });

    if($("#token_line").val() == ''){
        window.location.href = '/linelogin'
    }

    $("#btnCheckData").click(function (){
        event.preventDefault();
        $("#btnCheckData").prop('disabled', true);
        if($("#token_line").val() == ''){
            swal("ไม่สามารถสมัครสมาชิกได้", "กรุณากลับไปที่ Menu line เพื่อทำการ login", "error");
            $("#btnCheckData").prop('disabled', false);
        }else if($("#name").val() == '' || $("#last_name").val() == ''){
            swal("กรุณากรอก ชื่อ-นามสกุล", "", "error");
            $("#btnCheckData").prop('disabled', false);
        }else if($("#phone").val() == '' || $("#phone").val().length !== 10){
            swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
            $("#btnCheckData").prop('disabled', false);
        }else if($("#flexCheckChecked").val() == 'false' || $("#flexCheckChecked").val() == ''){
            swal("กรุณา ยอมรับข้อตกลงและเงื่อนไขการร่วมกิจกรรม", "", "error");
            $("#btnCheckData").prop('disabled', false);
        }else if($("#flexCheckChecked_2").val() == 'false' || $("#flexCheckChecked_2").val() == ''){
            swal("กรุณา ยอมรับกติกาและของรางวัลกิจกรรม", "", "error");
            $("#btnCheckData").prop('disabled', false);
        }else{ 
            var token_line      =   $("#token_line").val();
            var name            =   $("#name").val();
            var last_name       =   $("#last_name").val();
            var phone           =   $("#phone").val();

            $.ajax({
                url: "/register",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name":name, 
                    "last_name":last_name,
                    "phone":phone,
                    "token_line":token_line,
                },
                success: function(data){
                    if(data == 'success'){
                        swal("สมัครสมาชิกเรียบร้อย", "", "success");
                        setTimeout(function(){ 
                            window.location.href = '/choose'
                        }, 2000);
                    }else{
                        swal("กรุณาลองใหม่อีกครั้ง", "", "error");
                        $("#btnCheckData").prop('disabled', false);
                    }
                }
            })
            $("#btnCheckData").prop('disabled', false);

        }

    });




});

</script>


@endsection
