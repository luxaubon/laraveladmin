                                <div class="panel-body">

                                <form class="form-inline" action="/admin/user/index" method="GET" >
                                    <!-- <div class="form-group m-r-10">
                                        <a href="#modal-dialog"  class="btn btn-primary m-r-5 m-b-5" data-toggle="modal">Excel Download</a>
                                    </div> -->
                                    <div class="form-group m-r-10">
                                        <input type="text" class="form-control" name="search" placeholder="ค้นหา" value="<?php @$_GET['search'];?>">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning  m-r-5">ค้นหา</button>
                                </form>

                                <table id="data-table-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>    
                                            <th class="text-nowrap">ลำดับ</th>
                                            <th class="text-nowrap">ชื่อ</th>
                                            <th class="text-nowrap">นามสกุล</th>
                                            <th class="text-nowrap">เบอร์โทร</th>
                                            <th class="text-nowrap">ผ่าน</th>
                                            <th class="text-nowrap">ผิดพลาด</th>
                                            <th class="text-nowrap">ซ้ำ</th>
                                            <th class="text-nowrap">ยกเลิก</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $i=0;
                                        foreach($myArray as $db){
                                            $i++;
                                            
                                        echo '<tr class="odd gradeX">
                                                <td>'.$i.'</td>
                                                <td><a href="/admin/user/show/'.$db[0].'">'.$db[1].' </a></td>
                                                <td>'.$db[2].'</td>
                                                <td>'.$db[3].'</td>
                                                <td>'.$db[4].'</td>
                                                <td>'.$db[5].'</td>
                                                <td>'.$db[6].'</td>
                                                <td>'.$db[7].'</td>
                                            </tr>';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="8">{{ $member->links() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
