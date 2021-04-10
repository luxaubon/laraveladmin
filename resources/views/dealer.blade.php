@extends('layouts.head')

@section('content')

<div class="main-wrapper">
        <div class="main-title">
            <img src="assets_home/img/main-title.png" alt="">
        </div>
        <form action="/sendData" method="post" enctype="multipart/form-data">

        <div class="main-content text-center">
            <h3 class="title">ประเภทตัวแทนจำหน่าย</h3>
            <div class="shop-title">
                <img src="assets_home/img/dealer.png" alt="">
            </div>

            <div class="main-form">
                
                    @csrf
                    <input type="hidden" value="dealer" id="status" name="status"  required>
                    <div class="form-group">
                        <select name="region" id="region" class="form-control" required>
                            <option value="">กรุณาเลือกภาค</option>
                            <?php foreach($region as $region){ 
                                echo '<option value="'.$region->region_name.'">'.$region->region_name.'</option>';
                            }?>
                            
                        </select>
                    </div>
                    <div class="form-group" id="show_province">
                        <select name="" id="" class="form-control" required>
                            <option value="">กรุณาเลือกจังหวัด</option>
                        </select>
                    </div>
                    <div class="form-group" id="show_shop_name">
                        <select name="" id="" class="form-control" required>
                            <option value="">กรุณาเลือกร้านค้า</option>
                        </select>
                    </div>
                
            </div>

            <div class="upload-reciept">
                <p class="lead">กรุณาอัพโหลดใบเสร็จ</p>
        
                <div class="upload-file">
                  <input type="file" name="files[]" id="file" class="inputfile" accept="image/*" data-multiple-caption="คุณเลือกทั้งหมด {count} ไฟล์"  multiple required />
                  <label for="file"><span></span>
                    <div><i class="fal fa-camera"></i> กรุณาอัพโหลดใบเสร็จ</div>
                  </label>
                </div>
        
                <div class="row">
                  <div class="col-6">
                    <a href="/dealer" class="btn btn-block btn-secondary">ยกเลิก</a>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-block btn-primary" id="BTN_send">ตกลง</button>
                  </div>
                </div>
              </div>

              <div class="text-center mt-3">
                  <a href="/choose" class="btn btn-sm btn-dark"><i class="fal fa-home"></i> กลับไปหน้าแรก</a>
              </div>
        </div>

        <div class="main-product">
            <img src="assets_home/img/product.png" alt="">
        </div>
    </div>
    </form>


<script type="text/javascript">

    function showProvince(val){
        if(val !== ''){
            $.ajax({
                url: "/shop_name",
                method: "POST",
                data: {"_token": "{{ csrf_token() }}","val":val,},
                success: function(data){
                    if(data.status == 'success'){
                        $("#show_shop_name").html(data.data);
                    }else{
                        swal("กรุณาเลือกจังหวัด ใหม่อีกครั้ง", "", "error");
                    }
                }
            })
        }else{
            swal("กรุณาเลือกจังหวัด ใหม่อีกครั้ง", "", "error"); 
        }
    }

    $(document).ready(function() {

        $("#BTN_send").submit(function (){
            event.preventDefault();
            $("#BTN_send").prop('disabled', true);
            setTimeout(function(){ 
                $("#BTN_send").prop('disabled', false);
            }, 2000);
        });
        
        $('#region').on('change', function() {
            var val =  this.value;
            $.ajax({
                url: "/province",
                method: "POST",
                data: {"_token": "{{ csrf_token() }}","val":val,},
                success: function(data){

                    if(data.status == 'success'){
                        $("#show_province").html(data.data);
                    }else{
                        swal("กรุณาเลือกภาคใหม่อีกครั้ง", "", "error");
                    }
                }
            })

        });



    });

</script>

@endsection
