<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Payment Number List</h4>
                    @can('Pyment number create')
                    <button id="open_modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</button>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Payment Reason</th>
                                <th>Payment Method</th>
                                <th>Create By</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                @canany('Pyment number edit', 'Pyment number view', 'Pyment number delete')
                                <th class="text-right">Action</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody id="data-tbody">
                                @foreach ($data as $key=> $row)
                                <tr id="row_table_{{ $row->id}}">
                                    <td>{{ $row->number }}</td>
                                    <td>{{ $row->paymentReason->name }}</td>
                                    <td>{{ $row->paymentMethod->name }}</td>
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
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @can('Pyment number edit')
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="1" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></button>
                                            @endcan
                                            @can('Pyment number view')
                                            <button id="data-show" data-id="{{ $row->id }}" data-check="2" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-folder-open"></i></button>
                                            @endcan
                                            @can('Pyment number delete')
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
                <form class="form-valide" data-action="{{ route('transaction-payment-number.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <input type="hidden" name="id" id="set_id">
                    <div class="modal-body py-2">
                        <div class="row" id="main-row-data">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="member_id" class="col-md-4 col-form-label">Management
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="member_id" id="member_id" class="form-control dropdwon_select">
                                            <option disabled selected>--Select--</option>
                                            @foreach ($user as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="payment_method_id" class="col-md-4 col-form-label">Payment Method
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="payment_method_id" id="payment_method_id" class="form-control dropdwon_select">
                                            <option disabled selected>--Select--</option>
                                            @foreach ($payment_methods as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label">Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="number" id="number" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="payment_reason_id" class="col-md-4 col-form-label">Payment Reasons
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="payment_reason_id" id="payment_reason_id" class="form-control dropdwon_select">
                                            <option disabled selected>--Select--</option>
                                            @foreach ($payment_reasons as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="showReason" style="display: none">
                                <div class="form-group row">
                                    <label for="ref_reason_id" class="col-md-4 col-form-label">Event Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="ref_reason_id" id="ref_reason_id" class="form-control dropdwon_select">
                                            <option disabled selected>--Select--</option>
                                            @foreach ($ref_reason as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <select name="status" id="status" class="form-control dropdwon_select">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
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
        var paymentReason = $('#payment_reason_id').html();
        var paymentMethod = $('#payment_method_id').html();
        var refReason = $('#ref_reason_id').html();
        var status = $('#status').html();
    
        $(document).on('click','#open_modal',function(){
            $("#set_id").val('');
            $("#number").val('');
            $("#payment_reason_id").val('');
            $("#payment_method_id").val('');
            $("#ref_reason_id").val('');
            $("#status").val('');
            
            $('#set_id').prop("disabled", false);
            $('#number').prop("disabled", false);
            $('#payment_reason_id').html(paymentReason);
            $('#payment_method_id').html(paymentMethod);
            $('#ref_reason_id').html(refReason);
            $('#status').html(status);
    
            $(".modal-title").html('Add New Member Type');
            $(".submit_btn").show();
            $("#exampleModalCenter").modal('show');
    
            //--Dropdwon Search Fix
            newRow.find('.dropdwon_select').each(function () {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
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
                        row += '<td>' + response.data.number + '</td>';
                        row += '<td>' + response.paymentReason + '</td>';
                        row += '<td>' + response.paymentMethod + '</td>';
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
                url:'{{ route('transaction-payment-number.edit')}}',
                method:'GET',
                dataType:"JSON",
                data:{id:id},
                success:function(response){
                    if(check == 1){ //Edit
                        // Show loading indicator
                        $(".modal-title").html('Edit Payment Number');
                        $(".submit_btn").show();
    
                        $("#set_id").val(response.data.id);
                        $("#number").val(response.data.number);
    
                        //-- Get Payment Method
                        var payment_methods = response.methods; // Correct variable name
                        var payment_method_dr = $('#payment_method_id');
                        payment_method_dr.empty();
                        payment_method_dr.append('<option value="">--Select--</option>');
    
                        $.each(payment_methods, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.payment_method_id) ? 'selected' : '';
                            payment_method_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.name + '</option>');
                        });
                        
                        //-- Get Payment Reasons
                        var payment_reasons = response.reasons; // Correct variable name
                        var payment_reason_dr = $('#payment_reason_id');
                        payment_reason_dr.empty();
                        payment_reason_dr.append('<option value="">--Select--</option>');
    
                        $.each(payment_reasons, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.payment_reason_id) ? 'selected' : '';
                            payment_reason_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.name + '</option>');
                        });
    
                        //-- Get Ref Reasons
                        var ref_reasons = response.ref_reason;
                        var ref_reasons_dr = $('#ref_reason_id');
                        ref_reasons_dr.empty();
                        ref_reasons_dr.append('<option value="">--Select--</option>');
    
                        $.each(ref_reasons, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.ref_reason_id) ? 'selected' : '';
                            ref_reasons_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.title + '</option>');
                        });
    
                        var paymentReasonID = $('#payment_reason_id').val();
                        if(paymentReasonID == 2 ){ //Event
                            $('#showReason').show();
                        }
    
                        //--Status
                        $("#status").empty();
                        var status = $("#status");
                        var row = '<option value="1" ' + (response.data.status == 1 ? 'selected' : '') + '>Active</option>';
                        row += '<option value="0" ' + (response.data.status == 0 ? 'selected' : '') + '>Inactive</option>';
                        status.append(row);
    
                        $('#set_id').prop("disabled", false);
                        $('#number').prop("disabled", false);
                        $('#payment_reason_id').prop("disabled", false);
                        $('#payment_method_id').prop("disabled", false);
                        $('#ref_reason_id').prop("disabled", false);
                        $('#status').prop("disabled", false);
                    }else if(check == 2){ //View
                        $(".modal-title").html('View Payment Number');
                        $(".submit_btn").hide();
    
                        $("#set_id").val(response.data.id);
                        $("#number").val(response.data.number);
    
                        //-- Get Payment Reasons
                        var payment_reasons = response.reasons; // Correct variable name
                        var payment_reason_dr = $('#payment_reason_id');
                        payment_reason_dr.empty();
                        payment_reason_dr.append('<option value="">--Select--</option>');
    
                        $.each(payment_reasons, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.payment_reason_id) ? 'selected' : '';
                            payment_reason_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.name + '</option>');
                        });
    
                        //-- Get Ref Reasons
                        var ref_reasons = response.ref_reason;
                        var ref_reasons_dr = $('#ref_reason_id');
                        ref_reasons_dr.empty();
                        ref_reasons_dr.append('<option value="">--Select--</option>');
    
                        $.each(ref_reasons, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.payment_reason_id) ? 'selected' : '';
                            ref_reasons_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.title + '</option>');
                        });
    
                        var paymentReasonID = $('#payment_reason_id').val();
                        if(paymentReasonID == 2 ){ //Event
                            $('#showReason').show();
                        }
    
                        //-- Get Payment Method
                        var payment_methods = response.methods; // Correct variable name
                        var payment_method_dr = $('#payment_method_id');
                        payment_method_dr.empty();
                        payment_method_dr.append('<option value="">--Select--</option>');
    
                        $.each(payment_methods, function(index, option) { // Correct variable name
                            var selected = (option.id == response.data.payment_method_id) ? 'selected' : '';
                            payment_method_dr.append('<option value="' + option.id + '" ' + selected + '>' + option.name + '</option>');
                        });
    
                        //--Status
                        $("#status").empty();
                        var status = $("#status");
                        var row = '<option value="1" ' + (response.data.status == 1 ? 'selected' : '') + '>Active</option>';
                        row += '<option value="0" ' + (response.data.status == 0 ? 'selected' : '') + '>Inactive</option>';
                        status.append(row);
    
                        $('#set_id').prop("disabled", true);
                        $('#number').prop("disabled", true);
                        $('#payment_reason_id').prop("disabled", true);
                        $('#payment_method_id').prop("disabled", true);
                        $('#ref_reason_id').prop("disabled", true);
                        $('#status').prop("disabled", true);
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
                    // Show preloader
                    $("#loading").hide();
                    //--Dropdwon Search Fix
                    newRow.find('.dropdwon_select').each(function () {
                        $(this).select2({
                            dropdownParent: $(this).parent()
                        });
                    });
                },
                error: function(xhr, status, error) {
                    swal("Error!", "There are no details available for this item.", "error");
                }
            });
        });
    
        /*========// Delete Data //========*/
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
                        url:'{{ route('transaction-payment-number.delete')}}',
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
        //=======// Show Event //=======*/
        $(document).on('change','#payment_reason_id',function(){
            var paymentReasonID = $('#payment_reason_id').val();
            if(paymentReasonID == 2 ){ //Event
                $('#showReason').show();
            }else{
                $('#showReason').hide();
                $("#ref_reason_id").val('');
                $('#ref_reason_id').html(refReason);
            }
        });
    </script>
    @endpush

</x-app-layout>

