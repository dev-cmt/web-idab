<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lost Member List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="{{ route('lose_member.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create</a>
                    {{-- @endcan --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Batch</th>
                                    <th>Location</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td class="sorting_1"><img class="rounded-circle" src="{{asset('public')}}/images/lose_member/{{ $row->image }}" width="35" height="35" alt=""></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->batch}}</td>
                                    <td>{{ $row->location}}</td>
                                    <td class="d-flex justify-content-end">
                                        @can('User edit')
                                        <a href="{{ route('lose_member.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('User delete')
                                        <form action="{{ route('lose_member.destroy', $row->id) }}" method="POST">
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
