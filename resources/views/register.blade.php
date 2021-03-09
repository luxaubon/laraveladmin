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
    <a href="/rules" class="btn">
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
                <h2 class="title">ลงทะเบียนร่วมกิจกรรม</h2>
                <div class="main-mobile">
                    <form action="">
                        <div class="form-group">
                            <p>ชื่อและนามสกุล</p>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="ชื่อ">
                                </div>
                                <div class="col-6">
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="นามสกุล">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p>วันเดือนปีเกิด</p>
                            <div class="row">
                                <div class="col-4">
                                    <select id="date" name="date" class="form-control">
                                        <option value="">วัน</option>
                                        <?php for($i = 1; $i < 31; $i++){
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }?>
                                        
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select id="month" name="month" class="form-control">
                                        <option value="">เดือน</option>
                                        <option value="1">มกราคม</option>
                                        <option value="2">กุมภาพันธ์</option>
                                        <option value="3">มีนาคม</option>
                                        <option value="4">เมษายน</option>
                                        <option value="5">พฤษภาคม</option>
                                        <option value="6">มิถุนายน</option>
                                        <option value="7">กรกฎาคม</option>
                                        <option value="8">สิงหาคม</option>
                                        <option value="9">กันยายน</option>
                                        <option value="10">ตุลาคม</option>
                                        <option value="11">พฤศจิกายน</option>
                                        <option value="12">ธันวาคม</option>
                                    </select></div>
                                <div class="col-4">
                                    <input type="number" id="year" name="year" class="form-control" placeholder="พ.ศ." maxlength="4">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p>เพศ</p>
                                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="sex" name="sex" value="1" >
                                <label class="custom-control-label" for="customRadioInline1">ชาย</label>
                            </div>            

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="sex" name="sex" value="2" >
                                <label class="custom-control-label" for="customRadioInline2">หญิง</label>
                            </div>
                            

                        </div>

                        <div class="form-group">
                            <p>เบอร์โทรศัพท์</p>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php echo Session::get('ss_phone'); ?>" >
                        </div>

                        <div class="form-group">
                            <p>ที่อยู่ (กรุณากรอกข้อมูลตามบัตรประชาชน)</p>
                            <input type="tel" id="address" name="address" class="form-control" placeholder="ที่อยู่">
                        </div>

                        <div class="form-group">
                            <p>จังหวัด (กรุณากรอกข้อมูลตามบัตรประชาชน)</p>
                            <select id="province" name="province" class="form-control">
                                <option value="">กรุงเทพมหานคร</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>อาชีพ</p>
                            <select id="jobs" name="jobs" class="form-control">
                                <option value="">เลือกอาชีพ</option>
                                <option value="0">-ไม่ระบุ-</option>
                                <option value="1">พนักงานบริษัท</option>
                                <option value="2">พนักงานโรงงาน</option>
                                <option value="3">ข้าราชการ</option>
                                <option value="4">นักเรียน/นักศึกษา</option>
                                <option value="5">ลูกจ้างทั่วไป</option>
                                <option value="6">เจ้าของธุระกิจ</option>
                                <option value="7">พ่อค้า แม่ค้า (ค้าขาย)</option>
                                <option value="8">เกษตรกร</option>
                                <option value="9">เกษียณ/แม่บ้าน</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <p>เงินเดือน</p>
                            <select id="salary" name="salary" class="form-control">
                                <option value="">เลือกเงินเดือน</option>
                                <option value="0">-ไม่ระบุ-</option>
                                <option value="1">ต่ำกว่า 5,000 บาท</option>
                                <option value="2">5,001 - 7,999 บาท</option>
                                <option value="3">8,000 - 9,999 บาท</option>
                                <option value="4">10,000 - 11,999 บาท</option>
                                <option value="5">12,000 - 13,999 บาท</option>
                                <option value="6">14,000 - 15,999 บาท</option>
                                <option value="7">16,000 - 19,999 บาท</option>
                                <option value="8">20,000 - 24,999 บาท</option>
                                <option value="9">25,000 - 29,999 บาท</option>
                                <option value="10">30,000 บาท หรือมากกว่า</option>
                            </select>
                        </div>



                        <div class="form-check text-left mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                ยอมรับ <a href="#" data-toggle="modal"
                                    data-target="#terms-conditions">ข้อตกลงและเงื่อนไข</a>
                            </label>
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

  <a href="#" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
</div>
<!-- Content Wrapper @e -->

</div>
<!-- Main @s -->


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

    <script>
    $(document).ready(function() {

        $('#flexCheckChecked').change(function() {
          if ($(this).is(":checked")) {
              var text =  $(this).val('true')
              $('#terms-conditions').modal('toggle');
          } else {
              var text = $(this).val('false');
          }
        });

        $("#btnCheckData").click(function (){
            event.preventDefault();
            $("#btnCheckData").prop('disabled', true);

            if($("#name").val() == '' || $("#last_name").val() == ''){
                swal("กรุณากรอก ชื่อ-นามสกุล", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#date").val() == ''  || $("#month").val() == '' || $("#year").val() == ''){
                swal("กรุณากรอก วัน-เดือน-ปี เกิดของท่าน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($(".sex").is(":checked") ==  false){
                swal("กรุณา เลือกเพศ", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#phone").val() == '' || $("#phone").val().length !== 10){
                swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#address").val() == '' ){
                swal("กรุณา กรอกข้อมูลที่อยู่ตามบัตรประชาชน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#province").val() == '' ){
                swal("กรุณา เลือกจังหวัดตามบัตรประชนชน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#jobs").val() == ''){
                swal("กรุณา เลือกอาชีพของ่ทาน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            } else if($("#salary").val() == ''){
                swal("กรุณา เลือกฐานเงินเดือนของท่าน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#flexCheckChecked").val() == 'false' || $("#flexCheckChecked").val() == ''){
                swal("กรุณา ยอมรับ ข้อตกลงและเงื่อนไข", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else{ 
              
                var name            =   $("#name").val();
                var last_name       =   $("#last_name").val();
                var date            =   $("#date").val();
                var month           =   $("#month").val();
                var year            =   $("#year").val();
                var sex             =   $('input[name="sex"]:checked').val();
                var phone           =   $("#phone").val();
                var address         =   $("#address").val();
                var province        =   $("#province").val();
                var jobs            =   $("#jobs").val();
                var salary          =   $("#salary").val();
                $.ajax({
                    url: "/registerPhone",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name":name, 
                        "last_name":last_name,
                        "date":date,
                        "month":month,
                        "year":year, 
                        "sex":sex,
                        "phone":phone,
                        "address":address,
                        "province":province, 
                        "jobs":jobs,
                        "phone":phone,
                        "salary":salary,
                    },
                    success: function(data){
                        if(data == 'success'){
                            swal("สมัครสมาชิกเรียบร้อย", "", "success");
                            setTimeout(function(){ 
                                window.location.href = '/member'
                            }, 2000);
                        }else{
                            swal("กรุณาลองใหม่อีกครั้ง", "", "error");
                            $("#btnCheckData").prop('disabled', false);
                        }
                    }
                })

            }

         });

    });

    </script>

@endsection
