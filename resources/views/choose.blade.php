@extends('layouts.head')

@section('content')

<?php if(@Session::get('ss_phone') == null){echo '<script>window.location.assign("/")</script>'; } ?>
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
                <img src="/assets_home/img/title.png" alt="">
            </div>

            <!-- Main Title @e -->

            <div class="heading-title boxDataShow">
                <h2 class="title">กรุณาเลือกอั่งเปา</h2>
            </div>

            <div class="angpao-wrapper boxDataShow">
                <div class="angpao" id="clickOne">
                    <img src="/assets_home/img/angpao-1.jpg" alt="">
                </div>
                <div class="angpao" id="clickTwo">
                    <img src="/assets_home/img/angpao-2.jpg" alt="">
                </div>
                <div class="angpao" id="clickThree">
                    <img src="/assets_home/img/angpao-3.jpg" alt="">
                </div>
            </div>

            <!-- Main Title @e -->
            <?php
                //echo Session::get('ss_percentage');
            ?>

            <div class="heading-title boxShow" style="display: none;">
                <h2 class="title" id="boxText"></h2>
            </div>
            <div class="angpao-open boxShow" style="display: none;">
                <div class="angpao-result">
                    <div class="title">คุณได้รับส่วนลด</div>
                    <div class="discount"><?php echo $code; ?>%</div>
                    <div class="shop-code">
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="กรุณาใส่รหัสร้านค้า" id="shopcode" name="shopcode">
                                <input type="hidden" class="form-control" value="<?php echo $code; ?>" id="percentage" name="percentage">
                                <input type="hidden" class="form-control" value="<?php echo Session::get('ss_phone'); ?>" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <button type="button" id="btnSuccess" class="btn btn-block btn-primary">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
                <img src="/assets_home/img/aungpao-open.png" alt="">
            </div> 


            <!-- Main Title @s -->
            <div class="main-title boxSuccess" style="display: none;">
                <img src="/assets_home/img/title.png" alt="">
            </div>
            <!-- Main Title @e -->
            <div class="heading-title boxSuccess" style="display: none;">
                <h2 class="title">ดำเนินการสำเร็จ</h2>
            </div>
            <div class="done-message boxSuccess" style="display: none;">
                <i class="fas fa-check-circle"></i>
                <p>คุณได้รับส่วนลด <?php echo $code; ?> % จากกิจกรรม ตรุษจีนนี้ มีอั่งเปา เรียบร้อยแล้ว</p>
                <p>ขอบคุณค่ะ</p>
            </div>


        </div>
    </div>
    <!-- Main @e -->

    <script>
        $(document).ready(function() {
            
            $("#clickOne").click( () => {
                $(".boxShow").show();
                $(".boxDataShow").hide();
                $("#boxText").html('อั่งเปาซองที่ 1');
            })
            $("#clickTwo").click( () => {
                $(".boxShow").show();
                $(".boxDataShow").hide();
                $("#boxText").html('อั่งเปาซองที่ 2');
            })
            $("#clickThree").click( () => {
                $(".boxShow").show();
                $(".boxDataShow").hide();
                $("#boxText").html('อั่งเปาซองที่ 3');
            })

            $("#btnSuccess").prop('disabled', true);

            $("#shopcode").keyup(function(){
                $("#btnSuccess").prop('disabled', false);
            });

            $("#btnSuccess").click(function(){
                event.preventDefault();
                var shopcode = $("#shopcode").val();
                var percentage = $("#percentage").val();
                var phone = $("#phone").val();
                
                $.ajax({
                url: "/sendPercentage",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                        "shopcode":shopcode, 
                        "percentage":percentage,
                        "phone" : phone,
                    },
                    success: function(data){
                        if(data == 'success'){
                            swal("บรรทึกข้อมูลสำเร็จ", "", "success");
                            $(".boxShow").hide();
                            $(".boxDataShow").hide();
                            $(".boxSuccess").show();
                        }else{
                            swal("SHOPCODE ของท่านไม่ถูกต้อง", "", "error");
                        }
                    },
                    complete : function(data){

                    },
                })
        });

        });
    </script>
@endsection
