<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Photo Album List</h4>
                    @can('Gallery create')
                    <a href="{{route('gallery.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Add New</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Album Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key=> $row )
                                <tr>
                                    <td class="sorting_1"><img class="rounded-circle" src="{{asset('public/images/gallery')}}/{{ $row->cover }}" width="35" height="35" alt=""></td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>
                                        @if($row->public==1)
                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Public</span>
                                        @else
                                            <span class="badge light badge-warning"><i class="fa fa-circle text-danger mr-1"></i>Private</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        @can('Gallery edit')
                                        <a href="{{route('gallery.edit', $row ->id)}}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        <a href="{{route('gallery.show', ['gallery' => $row->id])}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                        @can('Gallery delete')
                                        <form action="{{route('gallery.destroy', $row->id)}}" method="post">
                                            <button class="btn btn-danger shadow btn-xs sharp" {{--id="delete"--}} onclick="return confirm('Are you sure?');" type="submit"><i class="fa fa-trash"></i></button>
                                            @csrf
                                            @method('delete')
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
