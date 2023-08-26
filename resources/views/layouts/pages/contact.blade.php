<x-app-layout>
    
    @foreach ($message as $row)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body"> 
                    <div id="DZ_W_Todo3" class="widget-media dz-scroll">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-panel">
                                    <div class="media mr-2">
                                        <img alt="image" width="50" src="{{asset('public/images')}}/profile/fix/member.jpg">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-1">{{$row->name}} <small class="text-muted">{{date("j F Y", strtotime($row->created_at))}}</small></h5>
                                        <p class="m-0"><strong class="text-primary"> Email: </strong> <strong class="text-dark mr-4"> {{$row->email}}</strong></p>
                                        <p class="m-0"><strong class="text-primary"> Subject: </strong> <strong class="text-dark mr-4"> {{$row->subject}}</strong></p>
                                        <p class="m-0 mb-2"><strong class="text-primary"> Message: </strong> {{$row->description}}</p>
                                        @if ($row->status != 0)
                                            <p class="m-0 mb-2"><strong class="text-success">Email Reply Successfully.</strong></p>
                                        @elseif ($row->status == 0)
                                        @can('Contact reply')
                                        <a href="{{route('contact-us.reply', $row->id)}}" class="btn btn-primary btn-xxs shadow">Reply</a>
                                        @endcan
                                        @can('Contact delete')
                                        <a href="{{route('contact-us.delete', $row->id)}}" class="btn btn-outline-danger btn-xxs">Delete</a>
                                        @endcan
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>