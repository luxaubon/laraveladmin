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
        echo '<a href="/toppender" class="btn btn-primary">
            <i class="fal fa-star"></i>
            <div>TOP SPENDER</div>
        </a>';
    }?>
  </div>


  <!-- Main Box @s -->
  <div class="main-box">
                <h2 class="title">ลงทะเบียนร่วมกิจกรรม</h2>
                <div class="main-mobile">
                    <form action="" id="form-insert" autocomplete="off" >
                        <div class="form-group">
                            <p>ชื่อและนามสกุล</p>
                            <div class="row">
                                    <div class="col-4">
                                    <select id="sex" name="sex" class="form-control">
                                        <option value="">คำนำหน้านาม</option>
                                        <option value="1">นาย </option>
                                        <option value="2">น.ส.</option>
                                        <option value="3">นาง</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <input type="text" id="name" name="name" onkeyup="isThaichar(this.value,this)" class="form-control" placeholder="ชื่อ">
                                </div>


                                <div class="col-4">
                                    <input type="text" id="last_name" onkeyup="isThaichar(this.value,this)" name="last_name" class="form-control" placeholder="นามสกุล">
                                </div> 
                            </div>
                        </div>


                        <!-- <div class="form-group">
                            <p>เพศ</p>
                            <select id="sex" name="sex" class="form-control">
                                <option value="">เพศ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <p>วันเดือนปีเกิด</p>
                            <div class="row">
                            <div class="col-4">
                                    <select class="form-control" name="day" id="day">
                                        <option value="">วัน</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option id="29" value="29">29</option>
                                        <option id="30" value="30">30</option>
                                        <option id="31" value="31">31</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <select id="month" name="month" class="form-control" >
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
                                    </select>
                                  </div>


                             <div class="col-4">
                                    <select id="year" name="year" class="form-control">
                                        <option value="">พ.ศ.</option>
                                        <?php 
                                        for($i = 2021; $i > 1921; $i--){
                                          $numshow = $i + 543;
                                            echo '<option value="'.$i.'">'.$numshow.'</option>';
                                        }
                                        ?>
                                        
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <p>เบอร์โทรศัพท์</p>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php echo $phone; ?>" readonly >
                        </div>

                        <div class="form-group">
                            <p>ที่อยู่ (กรุณากรอกข้อมูลตามบัตรประชาชน)</p>
                            <input type="text" id="address" name="address" class="form-control" placeholder="บ้านเลขที่ / ซอย / หมู่บ้าน">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>รหัสไปรษณีย์</label>
                                    <input name="zipcode" id='zipcode' class="form-control" type="text" placeholder="รหัสไปรษณีย์">
                                </div>
                                <div class="col-6">
                                    <label>จังหวัด</label>
                                    <input name="province" id="province" class="form-control" type="text" placeholder="จังหวัด">
                                </div>
                                <div class="col-6">
                                    <label>อำเภอ / เขต</label>
                                    <input name="amphoe" id="amphoe" class="form-control" type="text" placeholder="อำเภอ / เขต">
                                </div>
                                <div class="col-6">
                                    <label>ตำบล / แขวง</label>
                                    <input name="district" id="district" class="form-control" type="text" placeholder="ตำบล / แขวง">
                                </div>
                            </div>
                        </div>


                        <!-- <div class="form-group">
                            <p>จังหวัด (กรุณากรอกข้อมูลตามบัตรประชาชน)</p>
                            <select id="province" name="province" class="form-control">
                                <option value="">จังหวัด</option>
                                <?php 
                                // foreach($province as $province){
                                //     echo '<option value="'.$province['PROVINCE_ID'].'">'.$province['PROVINCE_NAME'].'</option>';
                                // }
                                ?>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <p>อาชีพ</p>
                            <select id="jobs" name="jobs" class="form-control">
                                <option value="">เลือกอาชีพ</option>
                                <option value="1">พนักงานบริษัท</option>
                                <option value="2">พนักงานโรงงาน</option>
                                <option value="3">ข้าราชการ</option>
                                <option value="4">นักเรียน/นักศึกษา</option>
                                <option value="5">ลูกจ้างทั่วไป</option>
                                <option value="6">เจ้าของธุระกิจ</option>
                                <option value="7">พ่อค้า แม่ค้า (ค้าขาย)</option>
                                <option value="8">เกษตรกร</option>
                                <option value="9">เกษียณ/แม่บ้าน</option>
                                <option value="0">-อื่นๆ-</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <p>เงินเดือน</p>
                            <select id="salary" name="salary" class="form-control">
                                <option value="">เลือกเงินเดือน</option>
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
                                <option value="0">-อื่นๆ-</option>
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

  <a href="https://www.facebook.com/HiVitaminC200" target="_blank" class="btn btn-block btn-facebook"><i class="fab fa-facebook"></i> <span>HiVitaminC200</span></a>
  
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

        $("#btnCheckData").click(function (){
            event.preventDefault();
            $("#btnCheckData").prop('disabled', true);
            if($("#name").val() == '' || $("#last_name").val() == ''){
                swal("กรุณากรอก ชื่อ-นามสกุล", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#day").val() == ''  || $("#month").val() == '' || $("#year").val() == ''){
                swal("กรุณาเลือก วัน-เดือน-ปี เกิดของท่าน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#sex").val() == ''){
                swal("กรุณา เลือกคำนำหน้านาม", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#phone").val() == '' || $("#phone").val().length !== 10){
                swal("กรุณากรอก เบอร์โทรศัพท์", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#address").val() == '' || $("#zipcode").val() == '' || $("#province").val() == '' || $("#amphoe").val() == '' || $("#district").val() == ''){
                swal("กรุณา กรอกข้อมูลที่อยู่ตามบัตรประชาชน", "", "error");
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
                var date            =   $("#day").val();
                var month           =   $("#month").val();
                var year            =   $("#year").val();
                var sex             =   $("#sex").val();
                var phone           =   $("#phone").val();

                var address         =   $("#address").val();
                var zipcode          =   $("#zipcode").val();
                var province         =   $("#province").val();
                var amphoe           =   $("#amphoe").val();
                var district         =   $("#district").val();

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
                        "zipcode":zipcode,
                        "province":province,
                        "amphoe":amphoe,
                        "district":district, 
                        "jobs":jobs,
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

        //  $("#year").change(function(){
        //     var year = $("#year").val();

        //     if(year!="" && year!="year"){
        //         $("#month").removeAttr('disabled');
        //         $("#month").val('');
        //     }else{
        //         $("#month").attr('disabled', true);
        //         $("#month").val('');
        //         $("#day").attr('disabled', true);
        //         $("#day").val('');
        //     }
        // });


        // $("#month").change(function(){
        //     var month = $("#month").val();
        //     var year = $("#year").val();

        //     if(month!="" && month!="month"){
        //         $("#day").removeAttr('disabled');
        //         $("#day").val('');

        //             if(month=="2"){
        //                 var lastday = $("#day option").last().val();
        //                 $("#31").remove();
        //                 $("#30").remove();
        //                 if(year % 4 != 0){
        //                     $("#29").remove();
        //                 }else if(lastday == 28){
        //                     $("#day").append("<option id='29' value='29'>29</option>");
        //                 }
        //             } else if(month == "3" || month == "6" || month == "10" || month == "9") {

        //                 var lastday = $("#day option").last().val();
        //                 if(lastday == 31){
        //                     $("#31").remove();
        //                 } else if(lastday == 29){
        //                     $("#day").append("<option id='30' value='30'>30</option>");
        //                 }else if(lastday == 28){
        //                     $("#day").append("<option id='29' value='29'>29</option><option id='30' value='30'>30</option>");
        //                 }
        //             }else{
        //                 var lastday = $("#day option").last().val();
        //                 if(lastday == 30){
        //                     $("#day").append("<option id='31' value='31'>31</option>");
        //                 } else if(lastday == 29){
        //                     $("#day").append("<option id='30' value='30'>30</option><option id='31' value='31'>31</option>");
        //                 }else if(lastday == 28){
        //                     $("#day").append("<option id='29' value='29'>29</option><option id='30' value='30'>30</option><option id='31' value='31'>31</option>");
        //                 }
        //             }
        //     }else{
        //         $("#day").attr('disabled', true);
        //         $("#day").val('');
        //     }
        // });

        

    });

    </script>

@endsection
