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
                                    <?php if($profile->sex == 1){$sex = 'ชาย';}else if($profile->sex == 2){$sex = 'น.ส.';}else if($profile->sex == 3){$sex = 'นาง';} ?>
                                    <input type="text" id="name" name="name" value="<?php echo $sex; ?>"  class="form-control" placeholder="คำนำหน้านาม" readonly>
                                </div>

                                <div class="col-4">
                                    <input type="text" id="name" name="name" value="<?php echo $profile->name; ?>" class="form-control" placeholder="ชื่อ" readonly>
                                </div>


                                <div class="col-4">
                                    <input type="text" id="last_name"  name="last_name" value="<?php echo $profile->last_name; ?>" class="form-control" placeholder="นามสกุล" readonly>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <p>วันเดือนปีเกิด</p>
                            <div class="row">
                            <div class="col-4">
                                    <select class="form-control" name="day" id="day">
                                        <option value="">วัน</option>
                                        <?php 
                                            for($i=1;$i < 32; $i++){
                                                $selected = ($profile->date == $i) ? 'selected' : '';
                                                echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                </div>

                                <div class="col-4">
                                    <select id="month" name="month" class="form-control" >
                                    <?php 
                                        switch ($profile->month) {
                                            case 1: $month = 'มกราคม';break;
                                            case 2: $month = 'กุมภาพันธ์';break;
                                            case 3: $month = 'มีนาคม';break;
                                            case 4: $month = 'เมษายน';break;
                                            case 5: $month = 'พฤษภาคม';break;
                                            case 6: $month = 'มิถุนายน';break;
                                            case 7: $month = 'กรกฎาคม';break;
                                            case 8: $month = 'สิงหาคม';break;
                                            case 9: $month = 'กันยายน';break;
                                            case 10: $month = 'ตุลาคม';break;
                                            case 11: $month = 'พฤศจิกายน';break;
                                            case 12: $month = 'ธันวาคม';break;
                                            default: $month = 'อื่นๆ'; break;
                                        }
                                        echo '<option value="'.$profile->month.'">'.$month.'</option>';
                                        ?>
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
                                          $selected = (($profile->year - 543) == $i) ? 'selected' : '';
                                            echo '<option value="'.$i.'" '.$selected.'>'.$numshow.'</option>';
                                        }
                                        ?>
                                        
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <p>เบอร์โทรศัพท์</p>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php echo $profile->phone; ?>" readonly >
                        </div>

                        <div class="form-group">
                            <p>ที่อยู่ (กรุณากรอกข้อมูลตามบัตรประชาชน)</p>
                            <input type="text" id="address" name="address" class="form-control" placeholder="ที่อยู่" value="<?php echo $profile->address; ?>">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>รหัสไปรษณีย์</label>
                                    <input name="zipcode" id='zipcode' class="form-control" type="text" placeholder="รหัสไปรษณีย์" value="<?php echo $profile->zipcode; ?>">
                                </div>
                                <div class="col-6">
                                    <label>จังหวัด</label>
                                    <input name="province" id="province" class="form-control" type="text" placeholder="จังหวัด" value="<?php echo $profile->province; ?>">
                                </div>
                                <div class="col-6">
                                    <label>อำเภอ / เขต</label>
                                    <input name="amphoe" id="amphoe" class="form-control" type="text" placeholder="อำเภอ / เขต" value="<?php echo $profile->amphoe; ?>">
                                </div>
                                <div class="col-6">
                                    <label>ตำบล / แขวง</label>
                                    <input name="district" id="district" class="form-control" type="text" placeholder="ตำบล / แขวง" value="<?php echo $profile->district; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <p>อาชีพ</p>
                            <select id="jobs" name="jobs" class="form-control" readonly>
                                <?php 
                                 switch ($profile->jobs) {
                                    case 0: $jobS = 'อื่นๆ';break;
                                    case 1: $jobS = 'พนักงานบริษัท';break;
                                    case 2: $jobS = 'พนักงานโรงงาน';break;
                                    case 3: $jobS = 'ข้าราชการ';break;
                                    case 4: $jobS = 'นักเรียน/นักศึกษา';break;
                                    case 5: $jobS = 'ลูกจ้างทั่วไป';break;
                                    case 6: $jobS = 'เจ้าของธุระกิจ';break;
                                    case 7: $jobS = 'พ่อค้า แม่ค้า (ค้าขาย)';break;
                                    case 8: $jobS = 'เกษตรกร';break;
                                    case 9: $jobS = 'เกษียณ/แม่บ้าน';break;
                                    default: $jobS = 'อื่นๆ'; break;
                                  }
                                  echo '<option value="">'.$jobS.'</option>';
                                  ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>เงินเดือน</p>
                            <select id="salary" name="salary" class="form-control" readonly>
                                <?php
                                switch ($profile->salary) {
                                    case 0: $salary = 'อื่นๆ';break;
                                    case 1: $salary = 'ต่ำกว่า 5,000 บาท';break;
                                    case 2: $salary = '5,001 - 7,999 บาท';break;
                                    case 3: $salary = '8,000 - 9,999 บาท';break;
                                    case 4: $salary = '10,000 - 11,999 บาท';break;
                                    case 5: $salary = '12,000 - 13,999 บาท';break;
                                    case 6: $salary = '14,000 - 15,999 บาท';break;
                                    case 7: $salary = '16,000 - 19,999 บาท';break;
                                    case 8: $salary = '20,000 - 24,999 บาท';break;
                                    case 9: $salary = '25,000 - 29,999 บาท';break;
                                    case 10: $salary = '30,000 บาท หรือมากกว่า';break;
                                    default: $salary = 'อื่นๆ'; break;
                                  }
                                  echo '<option value="">'.$salary.'</option>';
                                  ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-lg btn-primary" id="btnCheckData">ตกลง</button>
                        </div>
                    </form>
                </div>
            </div>
<!-- Main Box @e -->
<div class="bottom-button">
      <a href="/" class="btn btn-sm btn-dark"><i class="fal fa-angle-left"></i> ไปหน้าหลัก</a>
  </div>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">แก้ไขข้อมูลส่วนตัว</button>
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

        $("#btnCheckData").click(function (){
            event.preventDefault();
            $("#btnCheckData").prop('disabled', true);
             if($("#day").val() == ''  || $("#month").val() == '' || $("#year").val() == ''){
                swal("กรุณาเลือก วัน-เดือน-ปี เกิดของท่าน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else if($("#address").val() == '' || $("#zipcode").val() == '' || $("#province").val() == '' || $("#amphoe").val() == '' || $("#district").val() == ''){
                swal("กรุณา กรอกข้อมูลที่อยู่ตามบัตรประชาชน", "", "error");
                $("#btnCheckData").prop('disabled', false);
            }else{ 
                var date            =   $("#day").val();
                var month           =   $("#month").val();
                var year            =   $("#year").val();
                var address         =   $("#address").val();
                var zipcode          =   $("#zipcode").val();
                var province         =   $("#province").val();
                var amphoe           =   $("#amphoe").val();
                var district         =   $("#district").val();
                $.ajax({
                    url: "/updateProfile",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "date":date,
                        "month":month,
                        "year":year, 
                        "address":address,
                        "zipcode":zipcode,
                        "province":province,
                        "amphoe":amphoe,
                        "district":district, 
                    },
                    success: function(data){
                        if(data == 'success'){
                            swal("แก้ไขข้อมูลของ่ทานเรียบร้อย", "", "success");
                            setTimeout(function(){ 
                                window.location.href = '/profile'
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
