<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Message</h4>
                </div>
                <div class="card-body"> 
                    <div id="DZ_W_Todo3" class="widget-media dz-scroll height370 ps ps--active-y">
                        <ul class="timeline">
                            @foreach ($message as $row)
                            <li>
                                <div class="timeline-panel">
                                    <div class="media mr-2">
                                        <img alt="image" width="50" src="{{asset('public')}}/profile/{{$row->image}}">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-1">{{$row->name}} <small class="text-muted">{{date("j F Y", strtotime($row->created_at))}}</small></h5>
                                        <p class="m-0"><strong class="text-primary"> Subject: </strong> <strong class="text-dark mr-4"> {{$row->subject}}</strong></p>
                                        <p class="mb-1">{{$row->description}}</p>
                                        <a href="{{route('contact_chat',$row->user_id)}}" class="btn btn-primary btn-xxs shadow">Reply</a>
                                        <a href="#" class="btn btn-outline-danger btn-xxs">Delete</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 190px;"></div></div></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>