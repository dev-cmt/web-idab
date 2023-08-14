<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Pune Welfare Trust</h4>
                        {{-- <span>Lorem ipsum sit amet</span> --}}
                    </div>
                    <a href="{{route('users.index')}}" class="btn btn-info light">+ Add Card</a>
                </div>
            </div>
        </div>
        @foreach ($user as $key=> $row )
        <div class="col-xl-3 col-xxl-4 col-sm-6">
            <div class="card user-card">
                <div class="card-body pb-0">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="dz-media mr-3">
                            <img src="{{ asset('public/profile/'. $row->profile_photo_path) }}" alt="">
                        </div>
                        <div>
                            <h5 class="title"><a href="javascript:void(0);">{{$row->name}}</a></h5>
                            <span class="text-primary">{{$row->designation}}</span>
                        </div>
                    </div>
                    <p class="fs-12">Answering guest inquiries, directing phone calls, coordinating travel plans, and more.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="mb-0 title">Email</span> :
                            <span class="text-black ml-2"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cea3bea2ab8ea9a3afa7a2e0ada1a3">{{$row->email}}</a></span>
                        </li>
                        <li class="list-group-item">
                            <span class="mb-0 title">Phone</span> :
                            <span class="text-black ml-2">{{$row->contact_number}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="mb-0 title">Location</span> :
                            <span class="text-black desc-text ml-2">{{$row->address}}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="javascript:void(0);" class="btn btn-success btn-xs">Write Message</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>