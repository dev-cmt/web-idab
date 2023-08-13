<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Member Type List</h4>
                    <button id="open_modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</button>
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
                                <th>Action</th>
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
                                        <div class="d-flex">
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="1" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></button>
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="2" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-folder-open"></i></button>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                <form class="form-valide" data-action="{{ route('memebr-type.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
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


</x-app-layout>


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

        $(".modal-title").html('Add New Member Type');
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
                    if (response.data.status === 0)
                        row += '<span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Inactive</span>';
                    else if (response.data.status === 1)
                        row += '<span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>';
                    row += '</td>';
                    row += '<td class="d-flex">';
                    row += '<button type="button" class="btn btn-sm btn-success p-1 px-2 mr-1 edit_data" data-id="' + response.data.id + '"><i class="fa fa-pencil"></i>Edit</button>';
                    row += '<button type="button" class="btn btn-sm btn-info p-1 px-2 view_data" data-id="' + response.data.id + '"><i class="fa fa-folder-open"></i>View</button>';
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
            url:'{{ route('memebr-type.edit')}}',
            method:'GET',
            dataType:"JSON",
            data:{id:id},
            success:function(response){
                if(check == 1){ //Edit
                    $(".modal-title").html('Edit Member Type');

                    $("#set_id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#description").val(response.data.description);
                    $(".submit_btn").show();

                    $('#set_id').prop("disabled", false);
                    $('#name').prop("disabled", false);
                    $('#description').prop("disabled", false);
                }else if(check == 2){ //View
                    $(".modal-title").html('View Member Type');

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
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $("body").on('click','#delete_data',function(){
        var id = $(this).data('id');
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
                $.ajax({
                    url: "{{ url('inv_purchase/destroy')}}" + '/' + id,
                    method: 'DELETE',
                    type: 'DELETE',
                    success: function(response) {
                        toastr.success("Record deleted successfully!");
                        $("#row_todo_" + id).remove();
                        $('#table-body').closest('tr').remove();
                        updateSubtotal(0);

                        var countTrData = parseInt($('#items-table tbody tr .countTdData').length);
                        if(countTrData < 1 ){
                            $(".bd-example-modal-lg").modal('hide');
                            deleteMasterData();
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
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
    function deleteMasterData(){
        var id = $('#set_id').val();
        $.ajax({
            url:'{{ route('page.contact')}}',
            method:'GET',
            dataType:"JSON",
            data:{'id':id},
            success:function(response){
                swal("Your data save successfully", "Well done, you pressed a button", "success")
                    .then(function() {
                        location.reload();
                    });
            },
            error:function(){
                alert('Fail');
            }
        });
    }

</script>