<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registation Fee List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Transaction No.</th>
                                <th>Transfer Number</th>
                                <th>Method</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->payment_number}}</td>
                                    <td>{{$row->transaction_number}}</td>
                                    <td>{{$row->transfer_number}}</td>
                                    <td>{{$row->paymentMethod->name}}</td>
                                    <td>{{$row->payment_date}}</td>
                                    <td>{{$row->paid_amount}}</td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('transaction-registation.approve', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info p-1 mr-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('transaction-registation.cancel', $row->id)}}" method="post">
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
                    <h4 class="card-title">Registation Fee Record</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Transaction No.</th>
                                <th>Transfer Number</th>
                                <th>Method</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Approve By</th>
                                <th class="text-right">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->payment_number}}</td>
                                    <td>{{$row->transaction_number}}</td>
                                    <td>{{$row->transfer_number}}</td>
                                    <td>{{$row->paymentMethod->name}}</td>
                                    <td>{{$row->payment_date}}</td>
                                    <td>{{$row->paid_amount}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary p-1 px-2">{{$row->approveBy->name ?? 'null'}}</i></button>
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
