<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event Management List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a>
                    {{-- @endcan --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Payment Method</th>
                                    <th>Receive Number</th>
                                    <th>Status</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->payment_type}}</td>
                                    <td>{{ $row->pay_number}}</td>
                                    <td>{{ $row->status}}</td>
                                    <td class="d-flex justify-content-end">
                                        @can('User edit')
                                        <a href="{{ route('event_payment.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('User delete')
                                        <form action="{{ route('event_payment.destroy', $row->id) }}" method="POST">
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
