@extends('layouts.head')

@section('content')
<!-- Main @s -->
<div class="main-wrapper">


<div class="main-bar">
  <div class="main-logo">
    <img src="assets_home/img/Logo.png" alt="">
  </div>
  <div class="main-title">
    <img src="assets_home/img/title.png" alt="">
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


  <!-- Main Box @s -->
  <div class="main-box">
    <h2 class="title">กรุณาใส่ CODE </h2>
    <div class="main-mobile">
        <form action="/checkCode" method="POST" id="header_image_frm" enctype="multipart/form-data">    
            @csrf
            <div class="form-group" >
                <div class="input-group">
                    <input type="number" id="number0" name="number[]" class="form-control" placeholder="กรุณาใส่ CODE">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <input type="file" id="files_0" name="image" onchange="fileselectedchange(this,0);" accept="image/*" required>
                        </div>
                    </div>
                </div>
            </div>

            <div id="TextBoxContainer"></div>
            
            <div class="form-group">
                <a href="javascript:void(0);" class="btn btn-block" id="btnAdd">+ เพิ่มช่อง</a>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-lg btn-primary">ตกลง</button>
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

<script>
$(function () {
    
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        var myArray = $(".main-mobile .form-group .form-control").length;
        div.html(GetDynamicTextBox("",myArray));
        $("#TextBoxContainer").append(div);
    });

    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });

});


function fileselectedchange(obj,number){
    let formData = new FormData($('#header_image_frm')[0]);
    let file = $('#files_'+number)[0].files[0];
    formData.append('file', file, file.name,number);
 
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
        },
        error: function(data) {
            console.log(data);
            swal("ระบบไม่สามารถกรอกรหัส CODE ให้ท่านได้", "กรุณากรอกรหัสด้วยตัวท่านเอง", "error");
        }
    });

}


function GetDynamicTextBox(value,number) {
    return `<div class="form-group" >
                <div class="input-group">
                <button type="button" class="btn btn-danger remove">-</button>
                <input type="number" id="number`+number+`" name="number[]" class="form-control" placeholder="กรุณาใส่ CODE">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <input type="file" id="files_`+number+`" name="image" onchange="fileselectedchange(this,`+number+`);" accept="image/*" required>
                        </div>
                    </div>
                </div>
            </div>`;
}

    
    
</script>

@endsection
