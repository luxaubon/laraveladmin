                        <div class="panel-body">
                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($pages as $db)
                                     
                                    <tr class="odd gradeX" id="content{{ $db->id }}">
                                    	<?php 
                                            if($db['status'] == 1){
                                                $status = 'Lemon';
                                            }else if($db['status'] == 2){
                                                $status = 'Orange';
                                            }else{
                                                $status = 'Mix Berry';
                                            }
                                            if($db['online'] == 1){
                                                $online = 'แสดง';
                                            }else if($db['online'] == 2){
                                                $online = 'ไม่แสดง';
                                            }
                                        ?>
                                        <td>
                                            <strong>รสชาติ</strong> : {{$status}}<hr/>
                                            <strong>การแสดงผล</strong> : {{$online}}<hr/>
                                            <strong>วันเริ่มกิจกรรม</strong> : {{ date('Y-m-d\TH:i:s',$db->date_stop) }}<hr/>
                                            <strong>วันสิ้นสุดกิจกรรม</strong> : {{ date('Y-m-d\TH:i:s',$db->date_stop) }}<hr/>

                                            <div class="m-t-10">
                                                <a href="/admin/{{$folder}}/show/{{ $db->id }}" class="btn btn-primary"><i class="fas fa-cog fa-spin"></i> View & Edit</a>

                                                @IF($status == 2)
                                                <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>