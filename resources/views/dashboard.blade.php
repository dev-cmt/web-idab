<x-app-layout>
    <div class="row mt-4">
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body p-4">
                    <a href="#">
                        <div class="media">
                            <span class="mr-3">
                                <i class="las la-users-cog"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">AD HOC Committee</p>
                                <h3 class="text-white">{{$add_hoc}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body  p-4">
                    <a href="#">
                        <div class="media">
                            <span class="mr-3">
                                <i class="las la-users-cog"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Founder Members</p>
                                <h3 class="text-white">{{$executive}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <a href="{{route('page.member-all')}}">
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
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body p-4">
                    <a href="#">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">New Enrolled</p>
                                <h3 class="text-white">{{$enroll}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!---->
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body  p-4">
                    <a href="{{ route('dashboard-gallery.all')}}">
                    <div class="media">
                        <span class="mr-3">
                            <i class="lar la-image"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Gallery</p>
                            <h3 class="text-white">{{$gallery}}</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
                            </div>
                            <small>20% Increase in 30 Days</small>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
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
            <div class="page-titles m-auto text-center">
                <div class="welcome-text">
                    <h4>Latest Events</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
        </div>
        @foreach ($events as $row)
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">
                            <a href="{{route('page.events-details', $row->id)}}">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{asset('public')}}/images/events/{{ $row->image ?? 'null.jpg'}}" alt="">
                                </div>
                            </a>
                            <div class="new-arrival-content text-center mt-3">
                                <h4><a href="#">{{$row->title}}</a></h4>
                                <ul class="star-rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <span class="price">{{date("j F, Y", strtotime($row->event_date))}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
    @endif
</x-app-layout>
