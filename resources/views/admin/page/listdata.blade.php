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
                                            <strong>การจับรางวัล</strong> : {{json_decode($db->seo)[0]->seo_th}}
                                            <hr/>
                                            <strong>ราละเอียดย่อย</strong> : {{json_decode($db->caption)[0]->caption_th}}<hr/>
                                            <strong>Create Date</strong> : {{ $db->created_at->diffForHumans() }}<hr/>

                                            <div class="m-t-10">
                                                <a href="/admin/{{$folder}}/show/{{ $db->id }}" class="btn btn-primary"><i class="fas fa-cog fa-spin"></i> View & Edit</a>

                                                @if(Auth::id() == 1)
                                                    <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>