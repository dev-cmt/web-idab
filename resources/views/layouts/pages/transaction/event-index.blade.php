<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event Registation List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Info.</th>
                                <th>Payment Info.</th>
                                <th>Registation</th>
                                <th>Date</th>
                                <th>View Event</th>
                                <th class="text-right">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><strong>Name: </strong>{{$row->member->name}} <br> <strong>Type: </strong> {{$row->member->memberType->name}}</td>
                                    <td><strong>Number: </strong>{{$row->paymentDetails->payment_number}} <br> <strong>Method: </strong>{{$row->paymentDetails->paymentMethod->name}}</td>
                                    <td><strong>Person: </strong>{{$row->total_person}} <br> <strong>Amount: </strong>{{$row->total_amount}}</td>
                                    <td><strong>Event: </strong>{{date("j F, Y", strtotime($row->event->event_date))}} <br> <strong>Payment: </strong>{{date("j F, Y", strtotime($row->paymentDetails->payment_date))}}</td>
                                    <td class="text-center"><a href="{{ route('page.events-details', $row->id) }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-381-view"></i></a></td>
                                    <td class="text-right">
                                        @if($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Approve
                                        </span>
                                        @elseif($row->status == 2)
                                        <span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger mr-1"></i> Canceled
                                        </span>
                                        @else
                                        <span class="badge light badge-warning">
                                            <i class="fa fa-circle text-warning mr-1"></i> Pandding
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
