                        <div class="panel-body">
                        <?php $pass = rand(0,99999999); ?>
                        <a href="/admin/toprank/zip?pass=<?php echo $pass ?>" target="_blank" onclick="modalPassword('<?php echo $pass ?>')" class="btn btn-primary m-r-5 m-b-5">Excel Download</a>

                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>    
                                        <th class="text-nowrap">ลำดับ</th>
                                        <th class="text-nowrap">ชื่อ</th>
                                        <th class="text-nowrap">นามสกุล</th>
                                        <th class="text-nowrap">เบอร์โทร</th>
                                        <th class="text-nowrap">สิทธิ์</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     $i=0;
                                     foreach($member as $db){
                                         $i++;
                                    echo '<tr class="odd gradeX">
                                            <td>'.$i.'</td>
                                            <td>'.$db->name.'</td>
                                            <td>'.$db->last_name.'</td>
                                            <td>'.$db->phone.'</td>
                                            <td>'.$db->pointcode.'</td>
                                        </tr>';
                                     }
                                    ?>
                                </tbody>
                            </table>
                        </div>