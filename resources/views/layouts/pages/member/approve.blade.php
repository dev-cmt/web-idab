<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Approve List</h4>
                </div>

                <div class="card-body" id="reload">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{$row->memberType->name ?? 'null'}}</td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('member-approve.update', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info p-1 mr-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('member-approve.cancel', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-danger p-1">Canceled</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Approve History</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Type</th>
                                <th>Approve By</th>
                                <th class="text-right">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{$row->memberType->name ?? 'null'}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary p-1 px-2">{{$row->parentUser->name ?? 'null'}}</i></button>
                                    </td>
                                    <td class="text-right">@if($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Approve
                                        </span>
                                        @elseif($row->status == 2)
                                        <span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger mr-1"></i> Canceled
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>


<script type="text/javascript">
    /*========//Edit Or View Data//=========*/
    $(document).on('click', '#data-show', function(){
        var id = $(this).data('id');
        var check = $(this).data('check');
        $.ajax({
            url:'{{ route('memebr-qualification.edit')}}',
            method:'GET',
            dataType:"JSON",
            data:{id:id},
            success:function(response){
                if(check == 1){ //Edit
                    $(".modal-title").html('Edit Qualification');
                }else{
                    swal({
                        title: "No Data Found",
                        text: "There are no details available for this item.",
                        icon: "warning",
                        button: "OK",
                        dangerMode: true,
                    });
                }
                
                $("#exampleModalCenter").modal('show');
            },
            error: function(xhr, status, error) {
                swal("Error!", "There are no details available for this item.", "error");
            }
        });
    });

    /*========//Delete Data//========*/
    $(document).on('click', '#data-delete', function(){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // Place your delete code here
                var id = $(this).data('id');
                $.ajax({
                    url:'{{ route('memebr-qualification.delete')}}',
                    method:'GET',
                    dataType:"JSON",
                    data:{'id':id},
                    success:function(data){
                        swal("Success Message Title", "Well done, you pressed a button", "success");
                        $('[data-id="' + id + '"]').closest('tr').hide();
                    },
                    error:function(){
                        swal("Error!", "There are no details available for this item.", "error");
                    }
                });
            } else {
                // User clicked "No" button, do nothing
                swal("Your data is safe!", {
                    icon: "success",
                });
            }
        });
    });

</script>