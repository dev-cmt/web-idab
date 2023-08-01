<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Role List</h4>
                    @can('Role create')
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create Role</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($roles->count())
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <i id="showPerIcon{{$role->id}}" onclick="permissionShow('show', {{$role->id}})" style="color:#ff0081;font-size:20px;" class="ti-eye"></i>
                                        <i id="hidePerIcon{{$role->id}}" onclick="permissionShow('hide', {{$role->id}})" style="color:#ff0081;font-size:20px;" class="hidden ti-na"></i>
                                        <div id="permission{{$role->id}}" class="hidden">
                                            @foreach($role->permissions as $item)
                                            <div style="background:#34ad54;color:#fff;padding:5px;margin:6px 4px;font-size:12px;border-radius:8px;display: inline;">
                                                <span>{{ $item->name }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        @can('Role edit')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('Role delete')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger shadow btn-xs sharp" {{--id="delete"--}} onclick="return confirm('Are you sure?');" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>												
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .hidden{
            display: none;
        }
    </style>
    <script>
        function permissionShow(param, id) {
            if (param === 'show') {
                $('#permission' + id).removeClass('hidden');
                $('#showPerIcon' + id).addClass('hidden');
                $('#hidePerIcon' + id).removeClass('hidden');
            } else {
                $('#permission' + id).addClass('hidden');
                $('#showPerIcon' + id).removeClass('hidden');
                $('#hidePerIcon' + id).addClass('hidden');
            }
        }
    </script>
</x-app-layout>
