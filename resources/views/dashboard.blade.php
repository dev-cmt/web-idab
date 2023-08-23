<x-app-layout>
    <div class="row mt-4">
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body p-4">
                    <a href="{{route('bv.advisor')}}">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Adviser</p>
                                {{-- <h3 class="text-white">{{$cm_adviser}}</h3> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body  p-4">
                    <a href="{{route('bv.executive_committee')}}">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Executive Committee</p>
                                {{-- <h3 class="text-white">{{$cm_ecommittee}}</h3> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body  p-4">
                    <a href="{{route('bv.welfare')}}">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Pune Welfare Trust</p>
                                {{-- <h3 class="text-white">{{$cm_welfare}}</h3> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <a href="{{route('bv.member_list')}}">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Total Member</p>
                                <h3 class="text-white">{{count($user)}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!---->
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-user"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Lost Member</p>
                            {{-- <h3 class="text-white">{{count($lose_member)}}</h3> --}}
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 10%"></div>
                            </div>
                            <small>10% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">New Enrolled</p>
                            <h3 class="text-white">{{$enroll}}</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 90%"></div>
                            </div>
                            <small>90% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-diamond"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Pending Approve</p>
                            {{-- <h3 class="text-white">{{$approve}}</h3> --}}
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
                            </div>
                            <small>20% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <a href="{{route('page.events')}}">
                        <div class="media">
                            <span class="mr-3">
                                <i class="flaticon-381-calendar-1"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Upcoming Events</p>
                                <h3 class="text-white">{{$event}}</h3>
                                <div class="progress mb-2 bg-secondary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 60%"></div>
                                </div>
                                <small>60% Increase in 30 Days</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (count($events)> 0)
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-intro-title">Latest Events</h4>
                </div>
                <div class="card-body row">
                    <!-- Event Start -->
                        @foreach ($events as $row)
                        <div class="col-xl-4">
                            <div class="card mb-3">
                                <img class="card-img-top img-fluid" src="{{asset('public')}}/images/events/{{ $row->image ?? 'null.jpg'}}" style="height: 80%" alt="Card image cap">
                                <div class="card-header">
                                    <h5 class="card-title">{{$row->title}}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text description_2">{{$row->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text d-inline">{{date("j F, Y", strtotime($row->event_date))}}</p>
                                    <a href="{{route('page.events-details', $row->id)}}" class="card-link float-right">Read More...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    <!-- Event End -->
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
