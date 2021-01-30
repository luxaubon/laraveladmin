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
                                    	
                                        <td>
                                            <strong>จำนวนส่วนลดที่แสดง </strong> : {{$db->namecode}}<hr/>
                                            <!--strong>Code</strong> : {{$db->code}}<hr/-->
                                            <strong>จำนวนส่วนลดที่สามารถใช้ได้</strong> : {{ $db->numbercode }}<hr/>
                                            <strong>% ในการออกรางวัล</strong> : {{ $db->percentage }} %<hr/>
                                            <div class="m-t-10">
                                                <a href="/admin/{{$folder}}/show/{{ $db->id }}" class="btn btn-primary"><i class="fas fa-cog fa-spin"></i> View & Edit</a>

                                                
                                                <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>

                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>