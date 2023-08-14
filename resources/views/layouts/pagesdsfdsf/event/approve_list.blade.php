<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event Registation List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <table class="table header-border verticle-middle"> --}}
                        <table id="example3" class="display table-hover" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Transaction No.</th>
                                    <th scope="col">Person No.</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Event Details</th>
                                    <th scope="col">Registation</th>
                                    <th scope="col" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>
                                        @if ($row->payment_type == '0')Cash
                                        @elseif ($row->payment_type == '1')bKash
                                        @elseif ($row->payment_type == '2')Nagad
                                        @elseif ($row->payment_type == '3')Roket
                                        @endif
                                    </td>
                                    <td>{{$row->payment_number}}</td>
                                    <td>{{$row->transaction_no}}</td>
                                    <td>{{$row->person_no}}</td>
                                    <td>{{$row->total_amount}}</td>
                                    <td>
                                        <a class="badge badge-success" href="{{route('page.events_details', $row->event_id)}}">View</a>
                                    </td>
                                    <td>{{date('F d, Y', strtotime($row->created_at))}}</td>
                                    <td class="d-flex justify-content-center">
                                        @if ($row->status == '1')
                                        <span class="badge light badge-success">Done.</span>
                                        @elseif ($row->status == '2')
                                        <span class="badge light badge-danger">Cancel</span>
                                        @else  
                                        <form action="{{route('approve_event_fee.update', $row->id)}}" method="post">
                                            <button class="badge badge-success mr-2">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('cancel_event_fee.update', $row->id)}}" method="post">
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
