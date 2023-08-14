@extends('frontend.layouts.app')
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{asset('public')}}/images/events/{{ $data->image}}" alt="">
                        {{-- <div class="d-flex mb-2"> 
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{$data->event_date}}</small>
                        </div> --}}
                        <div class="d-flex mb-2">
                            <div class="d-flex mb-2">
                                <small style="margin-right:20px;"><i class="far fa-calendar-alt text-primary me-2"></i><span class="text-primary">Event Date:</span>{{date("j F, Y", strtotime($data->event_date))}}</small>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><span class="text-primary">Location:</span> {{$data->location}}</p>
                            </div>
                        </div>

                        <h1 class="mb-4">{{$data->title}}</h1>
                        <p>{{$data->description}}</p>
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Register Start -->
                    <div class="my-3" style="text-align: center;align-items: center;display: flex;justify-content: center;">
                        <a href="{{route('events_register', $data->id)}}" class="btn btn-secondary" style="width: 250px;padding: 15px;">Register Event</a>
                    </div>

                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    {{-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Events</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Design</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Keyword Research</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Email Marketing</a>
                        </div>
                    </div> --}}
                    <!-- Category End -->
    

                    <!-- Register Start -->
                    <div class="my-3 wow slideInUp" data-wow-delay="0.1s" style="text-align: center;align-items: center;display: flex;justify-content: center;">
                        <a href="{{route('events_register', $data->id)}}" class="btn btn-secondary" style="width: 100%;padding: 15px;">Register Event</a>
                    </div>

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Events</h3>
                        </div>
                        @foreach ($events as $row)
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('public')}}/images/events/{{ $row->image}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <div class="d-flex ">
                                <a href="" class="h5 fw-semi-bold px-3 mb-0 align-items-center bg-light description_4">{{$row->description}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp bg-light p-4" data-wow-delay="0.1s">
                        <img src="{{asset('public/frontend')}}/images/pune_logo.png" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
    
                    <!-- Tags Start -->
                   <!-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Tag Cloud</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                        </div>
                    </div>-->
                    <!-- Tags End -->
    
                    <!-- Plain Text Start -->
                    <!--<div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Plain Text</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet diam</p>
                            <a href="" class="btn btn-primary py-2 px-4">Read More</a>
                        </div>
                    </div>-->
                    <!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection