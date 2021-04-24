                        <div class="panel-body">
                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th width="10%" data-orderable="false"></th>
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($user as $db)
                                    <tr class="odd gradeX" id="content{{ $db->id }}">
                                    	<td width="10%" >
                                            <div class="card">
                                                <a href="{{ asset('public/images/'.$db->image) }}" class="image-link">
                                                    <img class="card-img-top" src="{{ asset('public/images/'.$db->image) }}" />
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>Name</strong> : {{ $db->name }}  {{$db->lname}}<hr/>
                                            <strong>Email</strong> : {{ $db->email }}<hr/>
                                            <strong>Create Date</strong> : {{ $db->created_at->diffForHumans() }}<hr/>

                                            <div class="m-t-10">
                                                @IF(Auth::user()->id == $db->id)
                                                <a href="/admin/{{$folder}}/show/{{ $db->id }}" class="btn btn-primary"><i class="fas fa-cog fa-spin"></i> View & Edit</a>
                                                @ENDIF

                                                
                                                @IF(Auth::user()->status == 1)
                                                    <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>
                                                @ENDIF
                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>