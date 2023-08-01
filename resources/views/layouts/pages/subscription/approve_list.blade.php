<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Approve Subscription List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Payment Number</th>
                                    <th>Transaction No</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $row->payment_number}}</td>
                                    <td>{{ $row->transaction_no}}</td>
                                    <td>{{ $row->duo_amount}}</td>
                                    <td>{{ date('d M Y', strtotime($row->start_date));}}</td>
                                    <td class="d-flex justify-content-end">
                                        @if ($row->status == '1')
                                        <span class="badge light badge-success">Done.</span>
                                        @elseif ($row->status == '2')  
                                        <span class="badge light badge-danger">Cancel</span>
                                        @else  
                                        <form action="{{route('subscription_approve.update', $row->id)}}" method="post">
                                            <button class="badge badge-success mr-2">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('subscription_cancel.update', $row->id)}}" method="post">
                                            <button class="badge badge-danger">Cancel</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
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

