<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Approve List</h4>
                    {{-- <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a> --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Gender</th>
                                    <th>Cell</th>
                                    <th>Marrital</th>
                                    <th>Batch</th>
                                    <th>Collage</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row )
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{ $row->gender == 0 ? 'Male' : 'Female'}}</td>
                                    <td>{{$row->contact_number}}</td>
                                    <td>
                                        @if($row->marrital_status==0)Unmarried
                                        @elseif ($row->marrital_status==1)Married
                                        @elseif ($row->marrital_status==2)Divorce
                                        @elseif ($row->marrital_status==3)widowed
                                        @endif
                                    </td>
                                    <td>{{$row->batch}}</td>
                                    <td>{{$row->collage}}</td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('member.approved', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info">Approve</i></button>
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
</x-app-layout>
