<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Approve List</h4>
                </div>

                <div class="card-body" id="reload">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Type</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->contact_number}}</td>
                                    <td>{{$row->methods_name}}</td>
                                    <td><a href="{{route('transaction-registation.index')}}">
                                        @if($row->is_payment == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Payment
                                        </span>
                                        @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i> No-Payment</span>
                                        
                                        @endif
                                    </a></td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('member-approve.update', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info p-1 mr-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('member-approve.cancel', $row->id)}}" method="post">
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
                    <h4 class="card-title">Member Approve History</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Type</th>
                                <th>Approve By</th>
                                <th class="text-right">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{$row->memberType->name ?? 'null'}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary p-1 px-2">{{$row->parentUser->name ?? 'null'}}</i></button>
                                    </td>
                                    <td class="text-right">
                                        @if($row->status == 1)
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