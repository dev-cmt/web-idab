@extends('frontend.layouts.guest')
@section('content')
    <!-- About Start -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Welcome to</h5>
                        <h1 class="mb-0">Pune Club</h1>
                    </div>
                    <p class="mb-4" style="text-align: justify;">Pune Club was established in 2005 by a group of Ex-student of Pune University from Bangladesh. From these humble beginnings the club has grown to be one of the most popular clubs in Dhaka for Bangladeshi student how study under Pune University. Our membership currently stands more than 2500 permanent memberships. Many of our members are diplomats, heads of international missions and leaders in global business. The foundation of friendship and brotherhood on which the Pune Club was built remains one of its most charming characteristics. Members have met here, partied here, brokered business agreements here,</p>
                    <a href="{{route('page.about')}}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Read more..</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('public/frontend')}}/images/carousel-4.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
    
    <!-- EC Member Start -->
    @if (count($ecommittee)>0)
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
                <h1 class="mb-0">Executive Committee Members</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                @foreach ($ecommittee as $key=> $row )
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-4 pb-4 ps-4">
                        <img class="img-fluid rounded" src="{{ asset('public/images/profile/' . $row->profile_photo_path) }}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1" style="font-size:20px;">{{$row->name}}</h4>
                            <small class="text-uppercase  text-info">{{$row->designation}}</small><br>
                            <small class="text-uppercase">({{$row->company_name}})</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-4 ps-4">
                        <div class="row mb-2">
                            <div class="col-lg-4"><strong>Email</strong></div>
                            <div class="col-lg-8">{{$row->email}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4"><strong>Mobile</strong></div>
                            <div class="col-lg-8">{{$row->contact_number}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4"><strong>Batch Year</strong></div>
                            <div class="col-lg-8">{{$row->batch}}</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('page.member_details', $row->user_id)}}" class="btn btn-primary py-2 px-4 mt-4">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- EC Member End -->

    
    <!-- Slider Gallery Start -->
    @if (count($gallery)>0)
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
                <h1 class="mb-0">Gallery</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($gallery as $key=> $row )
                <div class="team-item bg-light rounded overflow-hidden mx-4">
                    <div class="text-center p-2">
                        <h4 class="text-primary pt-2">{{$row->title}}</h4>
                    </div>
                    <div class="team-img position-relative overflow-hidden" style="height: 150px">
                        <a href="{{route('page.gallery_show', $row ->id)}}"><img class="img-fluid w-100" height="100%" src="{{asset('public/images')}}/gallery/{{ $row->cover }}" alt=""></a>
                    </div>
                    <div class="p-4 row">
                        <div class="col-lg-5">
                            <h6 class="text-primary"><i class="far fa-calendar-alt text-primary me-2"></i> Event</h6>
                        </div>
                        <div class="col-lg-7">
                            <h6 class="text-dark">: {{date("j F, Y", strtotime($row->date))}}</h6>
                        </div>
                        <div class="col-lg-5">
                            <h6 class="text-primary"><i class="far fa-calendar-alt text-primary me-2"></i> Published</h6>
                        </div>
                        <div class="col-lg-7">
                            <h6 class="text-dark">: {{date("j F, Y", strtotime($row->created_at))}}</h6>
                        </div>
                        <p class="text-uppercase description_2 m-0">{{$row->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- Slider Gallery End -->


    <!-- Event Start -->
    @if (count($event)>0)
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Events</h5>
                <h1 class="mb-0">Events</h1>
            </div>
            <div class="row g-5">
                @foreach ($event as $row)
                <div class="col-lg-4 m-0 py-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden" style="height: 180px">
                            <img class="img-fluid" src="{{asset('public')}}/images/events/{{ $row->image}}" alt="" width="100%">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{$row->caption}}</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                {{-- <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small> --}}
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{date("j F, Y", strtotime($row->event_date))}}</small>
                            </div>
                            <h4 class="mb-3">{{$row->title}}</h4>
                            <p class="description_1">{{$row->description}}</p>
                            <a class="text-uppercase text-success" href="{{route('page.events_details', $row->id)}}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <a href="{{route('page.events')}}" class="btn btn-primary py-md-3 px-md-5">More Event</a>
            </div>
        </div>
    </div>
    @endif
    <!-- Event End -->

        
    <!-- Missing Members Start -->
    @if (count($lose_member)>0)
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
                <h1 class="mb-0">Members We Lost</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                @foreach ($lose_member as $key=> $row)
                <div class="">
                    <div class="card team-item mx-4">
                        <div class="team-img position-relative overflow-hidden" style="height:220px">
                            <img src="{{ asset('public/images/lose_member/' . $row->image)}}" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$row->name}}</h5>
                            <p class="description_1 m-0">{{$row->description}}</p>
                            <div class="d-flex my-2">
                                <i class="bi bi-journal-album text-primary me-2"></i>
                                <p class="mb-0"><span class="text-primary">Batch:</span> {{$row->batch}}</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><span class="text-primary">Location:</span> {{$row->location}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- Missing Members End -->


    <!-- Quote Start -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Ask Anything</h5>
                        <h1 class="mb-0">Any Question? Please Feel Free to Contact Us</h1>
                    </div>
                    {{-- <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p> --}}
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+880 17 1113 6108</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0 @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth placeholder="Your Name" style="height: 55px;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0 @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email" style="height: 55px;">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0 @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}" placeholder="Your subject" style="height: 55px;">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="3" placeholder="Message"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn_white w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

@endsection
