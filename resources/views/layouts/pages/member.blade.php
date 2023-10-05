<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4>All IDAB Member List</h4>
                        {{-- <span>Lorem ipsum sit amet</span> --}}
                    </div>
                    <form action="{{ route('page.member-search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Keyword">
                            <button class="btn bg-default text-white px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    {{-- <a href="{{route('users.index')}}" class="btn btn-info light">+ Add Card</a> --}}
                </div>
            </div>
        </div>
        @foreach ($data as $key=> $row )
        <div class="col-xl-3 col-xxl-4 col-sm-6">
            <div class="card user-card">
                <div class="card-body pb-0">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="dz-media mr-3">
                            <img src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}" alt="">
                        </div>
                        <div>
                            <h5 class="title"><a href="javascript:void(0);">{{$row->name}}</a></h5>
                            <span class="text-primary">{{$row->memberType->name ?? 'Null'}}</span>
                        </div>
                    </div>
                    <p class="fs-12">Answering guest inquiries, directing phone calls, coordinating travel plans, and more.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="mb-0 title">Member ID</span> :
                            <span class="text-black ml-2">{{$row->member_code}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="mb-0 title">Email</span> :
                            <span class="text-black ml-2"><a href="mailto:{{$row->email}}" class="__cf_email__">{{$row->email}}</a></span>
                        </li>
                        <li class="list-group-item"> 
                            <span class="mb-0 title">Phone</span> :
                            <span class="text-black ml-2"><a href="tel:{{$row->infoPersonal->contact_number ?? 'Nul'}}">{{$row->infoPersonal->contact_number ?? 'Null'}}</a></span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{Route('profile_show', $row->id)}}" class="btn btn-success btn-xs">View Profile</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>