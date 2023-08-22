<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All User List<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5">{{ $users->total() }}</span></h4>
                    @can('Role create')
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create user</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User Name</th>
                                    <th>Role</th>
                                    <th>Member Type</th>
                                    <th>Committee Type</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                @foreach ($users as $user)
                                <tr>
                                    <td><img class="img-fluid" src="{{asset('public')}}/images/profile/{{ $user->profile_photo_path }}" width="40" height="40" alt=""></td>
                                    <td>{{ $user->name }}<br><a href="mailto:<nowiki>{{ $user->email}}">{{ $user->email }}</a></td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $user->memberType->name}}</td>
                                    <td>{{ $user->CommitteeType->name}}</td>
                                    <td>
                                        {{ $user->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            @if($user->status == '1')
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                            @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> Inactive
                                            @endif
                                        </div>
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        @can('User edit')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('User delete')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
