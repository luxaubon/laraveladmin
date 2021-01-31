                        <div class="panel-body">
                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>    
                                        <th class="text-nowrap">Name</th>
                                        <th class="text-nowrap">Sex</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">Phone</th>
                                        <th class="text-nowrap">OTP</th>
                                        <th class="text-nowrap">SHOP CODE</th>
                                        <th class="text-nowrap">Discount %</th>
                                        <th class="text-nowrap">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($pages as $db)
                                     
                                    <tr class="odd gradeX" id="content{{ $db->id }}">
                                        <td>{{$db->name}}</td>
                                        <td>{{$db->sex}}</td>
                                        <td>{{$db->email}}</td>
                                        <td>{{$db->phone}}</td>
                                        <td>{{$db->otp}}</td>
                                        <td>{{$db->shop_code}}</td>
                                        <td>{{$db->percentage}}</td>
                                        <td>{{ DateThai($db->created_at) }}</td>

                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>