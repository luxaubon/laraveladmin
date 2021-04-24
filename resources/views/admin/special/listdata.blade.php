                        <div class="panel-body">
                            <table id="data-table-default" class="table table-striped table-bordered">
                            
                                <thead>
                                    <tr>
                                        <th width="10%" data-orderable="false"></th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($pages as $db)
                                     
                                    <tr class="odd gradeX" id="content{{ $db->id }}">
                                    <td width="10%" >
                                            <div class="card">
                                                <a href="{{ asset('images/'.$db->image) }}" class="image-link">
                                                    <img class="card-img-top" src="{{ asset('images/'.$db->image) }}" />
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>Seo Title</strong> : {{$db->seo}}<hr/>
                                            <strong>Title</strong> : {{$db->title}}<hr/>
                                            <strong>Code</strong> : {{$db->code_number}}<hr/>
                                            <strong>จำนวนผู้ได้รับ</strong> : {{$db->count_sid}}<hr/>
                                            <strong>Create Date</strong> : {{ $db->created_at->diffForHumans() }}<hr/>

                                            <div class="m-t-10">
                                                <a href="/admin/{{$folder}}/show/{{ $db->id }}" class="btn btn-primary"><i class="fas fa-cog fa-spin"></i> View & Edit</a>

                                                @IF(Auth::user()->status == 1)
                                                    <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                     <tr>
                                        <td colspan="2">{{ $pages->links() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>