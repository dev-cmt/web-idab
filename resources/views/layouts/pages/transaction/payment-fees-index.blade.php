<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Payment Fees List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Create By</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                @can('Pyment annual fees')
                                <th class="text-right">Annual Fees</th>
                                @endcan
                                @can('Pyment membership fees')
                                <th class="text-right">Membership Fees</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody id="data-tbody">
                                @foreach ($data as $key=> $row)
                                <tr id="row_table_{{ $row->id}}">
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{date("j F, Y", strtotime($row->created_at))}}</td>
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
                                    @can('Pyment annual fees')
                                    <td class="text-right">
                                        <button id="data-show" data-id="{{ $row->id }}" data-check="1" class="btn btn-secondary py-1 px-2 mr-1"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>{{ intval($row->annual_fee) }}</button>
                                    </td>
                                    @endcan
                                    @can('Pyment membership fees')
                                    <td class="text-right">
                                        <button id="data-show" data-id="{{ $row->id }}" data-check="2" class="btn btn-secondary py-1 px-2 mr-1"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>{{ intval($row->registration_fee) }}</button>
                                    </td>
                                    @endcan
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
                <form class="form-valide" data-action="{{ route('transaction-payment-fees.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <input type="hidden" name="id" id="set_id">
                    <div class="modal-body py-2">
                        <div class="row" id="main-row-data">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label">Member Type</label>
                                    <label id="memberType" class="col-md-4 col-form-label"></label>
                                </div>
                            </div>
                            <div class="col-md-12" id="annualFeeShow">
                                <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label">Annual Fees
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="annual_fee" id="annual_fee" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="registrationFeeShow">
                                <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label">Membership Fees
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="registration_fee" id="registration_fee" class="form-control" value="">
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
    
            $(".modal-title").html('Edit Member Type');
            $(".submit_btn").show();
            $("#exampleModalCenter").modal('show');
            // Show preloader
            $("#loading").hide();
        });
        
        /*=======//Save Data //=========*/
        $(document).ready(function(){
            var form = '#add-user-form';
            $(form).on('submit', function(event){
                event.preventDefault();
                var url = $(this).attr('data-action');
                // Show preloader
                $("#loading").show();
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
                        $("#loading").hide();
    
                        // Create a row to insert into the table
                        var row = '<tr id="row_table_' + response.data.id + '">';
                        row += '<td>' + response.data.name + '</td>';
                        row += '<td>' + response.user + '</td>';
                        row += '<td>' + formatDate(response.data.created_at) + '</td>';
                        row += '<td>';
                        if (response.data.status == 0) {
                            row += '<span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i>Inactive</span>';
                        } else if (response.data.status == 1) {
                            row += '<span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>';
                        } else {
                            row += '<span class="badge light badge-secondary"><i class="fa fa-circle text-secondary mr-1"></i>Unknown</span>';
                        }
                        row += '</td>';
                        row += '<td class="text-right">'
                        row += '<button id="data-show" data-id="' + response.data.id + '" data-check="1" class="btn btn-secondary py-1 px-2 mr-1"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>' + response.data.annual_fee + '</button>'
                        row += '</td>'
                        row += '<td class="text-right">'
                        row += '<button id="data-show" data-id="' + response.data.id + '" data-check="2" class="btn btn-secondary py-1 px-2 mr-1"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>' + response.data.registration_fee + '</button>'
                        row += '</td>'
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
                        // Show preloader
                        $("#loading").hide();
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
            // Show preloader
            $("#loading").show();
            $.ajax({
                url:'{{ route('transaction-payment-fees.edit')}}',
                method:'GET',
                dataType:"JSON",
                data:{id:id},
                success:function(response){
                    $("#loading").hide();
                    $("#set_id").val(response.data.id);
                    $("#memberType").html(response.data.name);
                    if(check == 1){
                        $("#annualFeeShow").show();
                        $("#registrationFeeShow").hide();
                        $("#annual_fee").val(parseInt(response.data.annual_fee));
                        $(".modal-title").html('Edit Annual Fees');
                    }else{
                        $("#annualFeeShow").hide();
                        $("#registrationFeeShow").show();
                        $("#registration_fee").val(parseInt(response.data.registration_fee));
                        $(".modal-title").html('Edit Membership Fees');
                    }
                    $("#exampleModalCenter").modal('show');
                },
                error: function(xhr, status, error) {
                    swal("Error!", "There are no details available for this item.", "error");
                    $("#loading").hide();
                }
            });
        });
    </script>
    @endpush

</x-app-layout>


