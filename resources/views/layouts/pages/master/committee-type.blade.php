<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Committee Type List</h4>
                    @can('CommitteeType create')
                    <button id="open_modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</button>
                    @endcan
                </div>

                <div class="card-body" id="reload">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Create Date</th>
                                <th>Creator Name</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody id="data-tbody">
                                @foreach ($data as $key=> $row)
                                <tr id="row_table_{{ $row->id}}">
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{date("j F, Y", strtotime($row->created_at))}}</td>
                                    <td>{{$row->user->name ?? 'NULL'}}</td>
                                    <td>@if($row->status == 0)
                                        <span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger mr-1"></i> Inactive
                                        </span>
                                        @elseif($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Active
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @can('CommitteeType edit')
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="1" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></button>
                                            @endcan
                                            @can('CommitteeType view')
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="2" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-folder-open"></i></button>
                                            @endcan
                                            @can('CommitteeType delete')
                                            <button id="data-delete" data-id="{{ $row->id }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                            @endcan
                                        </div>
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
    <!--=======//Modal Show Data//========-->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form class="form-valide" data-action="{{ route('committee-type.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <input type="hidden" name="id" id="set_id">
                    <div class="modal-body py-2">
                        <div class="row" id="main-row-data">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" id="name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="remarks" class="col-md-4 col-form-label">Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary submit_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
    <script type="text/javascript">
        /*=======//Show Modal//=========*/
        $(document).on('click','#open_modal',function(){
            $("#set_id").val('');
            $("#name").val('');
            $("#description").val('');
            $(".submit_btn").show();

            $('#set_id').prop("disabled", false);
            $('#name').prop("disabled", false);
            $('#description').prop("disabled", false);

            $(".modal-title").html('Add New Committee Type');
            $("#exampleModalCenter").modal('show');
        });
        /*=======//Save Data //=========*/
        $(document).ready(function(){
            var form = '#add-user-form';
            $(form).on('submit', function(event){
                event.preventDefault();
                var url = $(this).attr('data-action');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                        swal("Success Message Title", "Well done, you pressed a button", "success");
                        $("#exampleModalCenter").modal('hide');
                        
                        // Create a row to insert into the table
                        var row = '<tr id="row_table_' + response.data.id + '">';
                        row += '<td>' + response.data.name + '</td>';
                        row += '<td>' + response.data.description + '</td>';
                        row += '<td>' + formatDate(response.data.created_at) + '</td>';
                        row += '<td>' + response.creator_name + '</td>';
                        row += '<td>';
                        if (response.data.status == 0) {
                            row += '<span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Inactive</span>';
                        } else if (response.data.status == 1) {
                            row += '<span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>';
                        } else {
                            row += '<span class="badge light badge-secondary"><i class="fa fa-circle text-secondary mr-1"></i>Unknown</span>';
                        }
                        row += '</td>';
                        row += '<td class="d-flex justify-content-end">';
                        row += '<button id="data-show" data-id="' + response.data.id + '" data-check="1" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></button>';
                        row += '<button id="data-show" data-id="' + response.data.id + '" data-check="2" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-folder-open"></i></button>';
                        row += '<button id="data-delete" data-id="' + response.data.id + '" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>';
                        row += '</td>';
                        row += '</tr>';

                        // Replace or prepend the row in the table
                        if ($("#set_id").val()) {
                            $("#row_table_" + response.data.id).replaceWith(row);
                        } else {
                            $("#data-tbody").prepend(row);
                        }
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li style="color:red">' + value + '</li>';
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: '<ul>' + errorHtml + '</ul>',
                            text: 'All input values are not null or empty.',
                        });
                    }
                });
            });
        });
        // Function to format the date
        function formatDate(dateString) {
            var date = new Date(dateString);
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString(undefined, options);
        }
        /*========//Edit Or View Data//=========*/
        $(document).on('click', '#data-show', function(){
            var id = $(this).data('id');
            var check = $(this).data('check');
            $.ajax({
                url:'{{ route('committee-type.edit')}}',
                method:'GET',
                dataType:"JSON",
                data:{id:id},
                success:function(response){
                    if(check == 1){ //Edit
                        $(".modal-title").html('Edit Committee Type');
                        $(".submit_btn").show();

                        $("#set_id").val(response.data.id);
                        $("#name").val(response.data.name);
                        $("#description").val(response.data.description);
                        
                        $("#status").empty();
                        var status = $("#status");
                        var row = '<option value="1" ' + (response.data.status == 1 ? 'selected' : '') + '>Active</option>';
                        row += '<option value="0" ' + (response.data.status == 0 ? 'selected' : '') + '>Inactive</option>';
                        status.append(row);


                        $('#set_id').prop("disabled", false);
                        $('#name').prop("disabled", false);
                        $('#description').prop("disabled", false);
                    }else if(check == 2){ //View
                        $(".modal-title").html('View Committee Type');

                        $("#set_id").val(response.data.id);
                        $("#name").val(response.data.name);
                        $("#description").val(response.data.description);
                        $(".submit_btn").hide();

                        $('#set_id').prop("disabled", true);
                        $('#name').prop("disabled", true);
                        $('#description').prop("disabled", true);
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
                        url:'{{ route('committee-type.delete')}}',
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
    @endpush

</x-app-layout>

