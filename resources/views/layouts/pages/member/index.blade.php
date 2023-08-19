<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$memberType}} List</h4>
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
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td><img class="img-fluid" src="{{asset('public')}}/images/profile/{{ $row->profile_photo_path }}" width="40" height="40" alt=""></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{$row->memberType->name ?? 'null'}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary p-1 px-2">{{$row->parentUser->name ?? 'null'}}</i></button>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('users.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('users.edit', $row->id) }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-381-view"></i></a>
                                        <a href="{{ route('users.edit', $row->id) }}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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
