<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Annual Frees List</h4>
                    <a href="{{ route('transaction-annual.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Payment</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Info.</th>
                                <th>Payment Info.</th>
                                <th>Transfer Info.</th>
                                <th>Details</th>
                                <th class="text-right">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><strong>Name: </strong>{{$row->member->name}} <br> <strong>Type: </strong> {{$row->member->memberType->name}}</td>
                                    <td><strong>Number: </strong>{{$row->payment_number}} <br> <strong>Method: </strong>{{$row->paymentMethod->name}}</td>
                                    <td><strong>Transfer No.: </strong>{{$row->transfer_number}} <br> <strong>Transaction No.: </strong>{{$row->transaction_number}}</td>
                                    <td><strong>Date: </strong>{{date("j F, Y", strtotime($row->payment_date))}}<br> <strong>Amount: </strong>{{$row->paid_amount}}</td>
                                    <td class="text-right">@if($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Approve
                                        </span>
                                        @elseif($row->status == 2)
                                        <span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger mr-1"></i> Canceled
                                        </span>
                                        @else
                                        <span class="badge light badge-warning">
                                            <i class="fa fa-circle text-warning mr-1"></i> Pending
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
