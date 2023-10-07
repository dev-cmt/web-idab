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
                                <th>Image</th>
                                <th>Information</th>
                                <th>Contact Info.</th>
                                <th>Documents</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img class="img-fluid" src="{{ asset('public/images/profile/' . $row->profile_photo_path) }}" width="40" height="40" alt=""></td>
                                    <td>
                                        <strong>Name: </strong>{{ $row->name }} <br>
                                        <strong>Type: </strong> {{ $row->memberType->name ?? 'null' }}
                                    </td>
                                    <td>
                                        <strong>Email: </strong><a href="mailto:{{ $row->email }}">{{ $row->email }}</a>  <br>
                                        <strong>Number: </strong>{{ $row->contact_number ?? 'null' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('member-document.downloadZipFile', $row->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1"><i class="flaticon-381-download"></i><span class="btn-icon-add"></span>Zip</a>                                    

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-info p-1 mr-1" data-toggle="modal" data-target="#exampleModalCenter">Choose</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Memebr Documents Dwonload</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{ route('document-trade-licence.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Trade Licence
                                                        </a>
                                                        <a href="{{ route('document-tin-certificate.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> TIN Certificate
                                                        </a>
                                                        <a href="{{ route('document-nid-photo-copy.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> NID Photo Copy
                                                        </a>
                                                        <a href="{{ route('document-passport-photo.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Passport Photo
                                                        </a>
                                                        <a href="{{ route('document-edu-certificate.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Education Certificate
                                                        </a>
                                                        <a href="{{ route('document-experience-certificate.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Experience Certificate
                                                        </a>
                                                        <a href="{{ route('document-stu-id-copy.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Student Id Copy
                                                        </a>
                                                        <a href="{{ route('document-recoment-letter.download', $row->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <span class="flaticon-381-download"></span> Recoment Letter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('transaction-registation-approve.index') }}">
                                            @if ($row->paymentDetails->status == 1)
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-success mr-1"></i> Payment
                                            </span>
                                            @else
                                            <span class="badge light badge-danger"><i class="fa fa-circle text-danger mr-1"></i> No-Payment</span>
                                            @endif
                                        </a>
                                    </td>
                                    @can('Member approved')
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <form action="{{ route('member-approve.update', $row->id) }}" method="post">
                                                <button class="btn btn-sm btn-info p-1 m-1">Approve</button>
                                                @csrf
                                                @method('PATCH')
                                            </form>
                                            <form action="{{ route('member-approve.cancel', $row->id) }}" method="post">
                                                <button class="btn btn-sm btn-danger p-1 m-1">Canceled</button>
                                                @csrf
                                                @method('PATCH')
                                            </form>
                                        </div>
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

    @can('Member approve record')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Approve History</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="display " style="min-width: 845px">
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
                                @foreach ($record as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{ $row->memberType->name ?? 'null' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary p-1 px-2">{{ $row->parentUser->name ?? 'null' }}</button>
                                    </td>
                                    <td class="text-right">
                                        @if ($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Approve
                                        </span>
                                        @elseif ($row->status == 2)
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
    @endcan
</x-app-layout>
