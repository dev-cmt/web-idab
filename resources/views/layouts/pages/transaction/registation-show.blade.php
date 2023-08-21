<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registation Fee Details</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Member Name:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->member->name}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Member Type:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->member->memberType->name}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Payment Number:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->payment_number}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Payment Method:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->paymentMethod->name}}</label>
                            </div>
                        </div>
                        @if ($data->paymentMethod->id != 5)
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Transaction No.:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->transaction_number}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Transfer Number:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->transfer_number}}</label>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Payment Date:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->payment_date}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Paid Amount:</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->paid_amount}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Approve By</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->approveBy->name}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label"><strong>Approve Status</strong></label>
                                <label for="number" class="col-md-5 col-form-label">{{$data->status == 1 ? 'Approve' : 'Canceled'}}</label>
                            </div>
                        </div>
                        @if ($data->paymentMethod->id == 5)
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('transaction-registration.download', $data->id) }}" target="blank" class="btn btn-sm btn-secondary p-1 px-2 mr-1">
                                    <span class="flaticon-381-download"></span> Download Slip
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>
