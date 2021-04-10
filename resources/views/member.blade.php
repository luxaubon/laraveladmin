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
<div class="main-point">
      <?php if($point > 0){echo '<span class="btn btn-sm btn-primary"><a href="/history" style="color: white;">สิทธิ์สะสมของคุณ : '.$point.'</a></span>';} ?>
      <!-- <span class="btn btn-sm btn-dark">อันดับของคุณ 999</span> -->
  </div>
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
        echo '<a href="/toppender" class="btn btn-primary">
            <i class="fal fa-star"></i>
            <div>TOP SPENDER</div>
        </a>';
    }?>
  </div>


  <!-- Main Box @s -->
  <div class="main-box">
    <h2 class="title">กรุณา กรอกรหัสใต้ฝา</h2>
    <div class="main-mobile">
        <form action="/checkCode" method="POST" id="header_image_frm" enctype="multipart/form-data">    
            @csrf
            <div class="form-group" >
                <div class="input-group">
                <button type="button" class="btn" style="background: white;border-color: white;"></button>
                    <input type="number" id="number0" name="number[]" onkeyup="isThaichar(this.value,this)" class="form-control txtCode" placeholder="กรุณา กรอกรหัสใต้ฝา"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
                    <div class="input-group-append">
                        <div class="upload-btn-wrapper input-group-text">
                          <i class="fal fa-camera"></i>
                          <input type="file" id="files_0" name="image[]" onchange="fileselectedchange(this,0);" accept="image/*;capture=camera"  class="checkfile">
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group">
                <button type="button" class="btn" style="background: white;border-color: white;"></button>
                    <input type="number" id="number1" name="number[]" onkeyup="isThaichar(this.value,this)" class="form-control txtCode" placeholder="กรุณา กรอกรหัสใต้ฝา"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
                    <div class="input-group-append">
                        <div class="upload-btn-wrapper input-group-text">
                          <i class="fal fa-camera"></i>
                          <input type="file" id="files_1" name="image[]" onchange="fileselectedchange(this,1);" accept="image/*;capture=camera"  class="checkfile">
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group">
                <button type="button" class="btn" style="background: white;border-color: white;"></button>
                    <input type="number" id="number2" name="number[]" onkeyup="isThaichar(this.value,this)" class="form-control txtCode" placeholder="กรุณา กรอกรหัสใต้ฝา"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
                    <div class="input-group-append">
                        <div class="upload-btn-wrapper input-group-text">
                          <i class="fal fa-camera"></i>
                          <input type="file" id="files_2" name="image[]" onchange="fileselectedchange(this,2);" accept="image/*;capture=camera"  class="checkfile">
                      </div>
                    </div>
                </div>
            </div>
            
            <div id="TextBoxContainer"></div>
            <?php if($block == 'block'){

              }else{?>
            <div class="form-group">
                <a href="javascript:void(0);" class="btn btn-block" id="btnAdd">+ เพิ่มช่อง</a>
            </div>

            <!-- <div class="form-group">
                <button type="submit" class="btn btn-block btn-lg btn-primary" id="btnSend">ตกลง</button>
            </div> -->
            <div class="form-group">
                <button type="button" class="btn btn-block btn-lg btn-primary" id="btnShow">ตกลง</button>
            </div>
            <?php } ?>

            <div class="modal fade" id="showSum" tabindex="-1" role="dialog" aria-labelledby="showSum" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-display">

                    <h3 class="title">
                      กรุณาตรวจสอบอีกครั้ง
                    </h3>
                    <div class="desc" id="modalText">
                    
                    </div>
                    <div class="row">
                      <div class="col-6"><button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">ยกเลิก</button></div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-block btn-primary" id="btnSend">ตกลง</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
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

  <a href="https://www.facebook.com/HiVitaminC200" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s -->
<div class="modal fade" id="get-otp" tabindex="-1" role="dialog" aria-labelledby="get-otp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-display">
          <img src="images/loading.gif" alt="">
          <h3 class="title">
            กรุณารอสักครู่
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>




<script>

<?php if($block == 'block'){

  echo 'swal("ขออภัยท่านกรอกรหัสผิด", "เกินกว่าสิทธิ์ที่กำหนด กลับมาลองอีกครั้งในวันที่ '.DateThai($dateblock).'", "error");';
}?>

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByClassName("checkfile");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("แนบภาพรหัสใต้ฝา");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})

        function isThaichar(str,obj){
            var orgi_text="1234567890";
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

  $("#btnSend").submit(function (){
    $("#btnSend").hide();
    $('#get-otp').modal('toggle');
  });

   $("#btnShow").click(function (){
    var returnData = 1;
    var numCount = 0;

      $('input[type=number]').each(function(){
          var val = $(this).val();
          if(val){
            console.log(numCount,val,"#files_"+numCount);
            var files = $("#files_"+numCount).val();
            if(!files){
                swal("แนบภาพรหัสใต้ฝา ช่องที่ "+(numCount+1)+" ", "", "error");
                returnData = 2;
            }else{
                returnData = 0;
            }
          }
          numCount++;
      });

    if(returnData == 0){
      var elements = document.getElementsByClassName("txtCode");
      var data = '';
      var num = 0;
      for (var i = 0; i < elements.length; i++) {
        num++;
        // data+='<p><h3>'+ num +'. ' + elements[i].value+'</h3></p>';
        data+='<p><h3>'+elements[i].value+'</h3></p>';
      }
      $("#modalText").html(data)
      $('#showSum').modal('toggle');
    }else if(returnData == 1){
      swal("กรุณากรอกรหัสใต้ฝา", "", "error");
    }

    console.log(returnData);
  });

});

$(function () {
    
    $("#btnAdd").bind("click", function () {
        var div = $("<div/>");
        var myArray = $(".main-mobile .form-group .form-control").length;
        console.log(myArray);
        if(myArray < 10){
          div.html(GetDynamicTextBox("",myArray));
          $("#TextBoxContainer").append(div);
        }else{
          swal("ไม่สามารถเพิ่มได้", "ระบบสามารถเพิ่มได้ 10/ครั้ง", "error");
        }
    });

    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
       
    });

});


function fileselectedchange(obj,number){
    let formData = new FormData($('#header_image_frm')[0]);
    let file = $('#files_'+number)[0].files[0];
    formData.append('file', file, file.name);
    formData.append('myarray', number);
    $('#get-otp').modal('toggle');
    $.ajax({
        url: '{{ url("/ocr") }}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',   
        contentType: false,
        processData: false,   
        cache: false,        
        data: formData,
        success: function(data) {
            $("#number"+number).val(data);
            $('#get-otp').modal('toggle');
        },
        error: function(data) {
            $('#get-otp').modal('toggle');
            swal("ระบบไม่สามารถกรอกรหัส CODE ให้ท่านได้", "กรุณากรอกรหัสใต้ฝาด้วยตัวท่านเอง", "error");
        }
    });

}


function GetDynamicTextBox(value,number) {
    return `<div class="form-group" >
                <div class="input-group">
                    <button type="button" class="btn btn-danger remove">-</button>
                    <input type="number" id="number`+number+`" name="number[]" onkeyup="isThaichar(this.value,this)" class="form-control txtCode" placeholder="กรุณา กรอกรหัสใต้ฝา" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
                    <div class="input-group-append">
                      <div class="upload-btn-wrapper input-group-text">
                          <i class="fal fa-camera"></i>
                          <input type="file" id="files_`+number+`" name="image[]" onchange="fileselectedchange(this,`+number+`);" accept="image/*;capture=camera" class="checkfile">
                      </div>
                    </div>
                    
                </div>
            </div>`;
}

    
    
</script>

@endsection
