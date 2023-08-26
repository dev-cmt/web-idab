<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    @can('Event create')
                    <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Caption</th>
                                    <th>Event Date</th>
                                    <th>Location</th>
                                    <th>Management</th>
                                    <th>Status</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td class="sorting_1"><img class="rounded-circle" src="{{asset('public')}}/images/events/{{ $row->image }}" width="35" height="35" alt=""></td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->caption}}</td>
                                    <td>{{ $row->event_date}}</td>
                                    <td>{{ $row->location}}</td>
                                    <td><a href="{{ route('transaction-payment-number.index') }}" class="btn btn-success btn-xs">Assign</a></td>
                                    <td>
                                        @if($row->status==1)
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>
                                        @else
                                            <span class="badge light badge-warning"><i class="fa fa-circle text-danger mr-1"></i>Inactive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        @can('Event edit')
                                        <a href="{{ route('event.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('Event delete')
                                        <form action="{{ route('event.destroy', $row->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?');" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
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
