@extends('frontend.layouts.app')
@section('title', 'Events Details')
<style>
    .recent-blog-item h1{
        font-size: 16px;
        font-weight: 600;
        color: #ff0000;
        padding-top: 10px;
    }
</style>
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{asset('public')}}/images/events/{{ $data->image ?? 'null.jpg'}}" alt="">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-geo-alt text-default me-2"></i>
                                <p class="mb-0"><span class="text-default">Location:</span> {{$data->location}}</p>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-calendar-week-fill text-default me-2"></i>
                                <p class="mb-0"><span class="text-default">Event Date:</span> {{date("j F, Y", strtotime($data->event_date))}}</p>
                            </div>
                        </div>
                        <h1 class="mb-4">{{$data->title}}</h1>
                        <p>{{$data->description}}</p>
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Register Start -->
                    <div class="my-3 d-flex justify-content-center">
                        <a href="{{route('transaction-event.create', $data->id)}}" class="btn bg-default text-white py-4" style="width: 250px; border-radius: 0;"><strong>Event Registation</strong></a>
                    </div>

                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <form action="{{ route('page.events-search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control p-3" placeholder="Keyword">
                                <button class="btn bg-default text-white px-4"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
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
    
                    <!-- Recent Post Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Events</h3>
                        </div>
                        @foreach ($events as $row)
                        <div class="recent-blog-item d-flex overflow-hidden mb-3 bg-light">
                            <img class="img-fluid" src="{{asset('public')}}/images/events/{{ $row->image}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <div class="px-3">
                                <h1>{{$row->title}}</h1>
                                <p class="description_2">{{$row->description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 bg-light p-4">
                        <img src="{{asset('public/images')}}/logo.png" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection