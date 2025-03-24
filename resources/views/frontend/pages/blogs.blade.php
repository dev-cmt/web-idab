@extends('frontend.layouts.app')
@section('title', 'News')

@section('style')
<style>
    .blog-item{
        border: 2px solid #ff0000;
    }
    .blog-item:hover{
        box-shadow: 0 0px 10px #ff0000;
    }
    .recent-blog-item h1{
        font-size: 16px;
        font-weight: 600;
        color: #ff0000;
        padding-top: 10px;
    }
    .pagination{
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>
@endsection
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="row g-5">
                            <!--Item-->
                            <div class="col-md-6">
                                <div class="blog-item bg-light overflow-hidden">
                                    <div class="position-relative overflow-hidden" style="height: 200px">
                                        <a href="{{route('page.blogs_details')}}">
                                            <img class="img-fluid" src="{{asset('public')}}/images/pages/news-01.jpg" alt="" width="100%">
                                            <!--<span class="position-absolute top-0 start-0 bg-default text-white mt-5 py-2 px-4">4 February, 2025</span>-->
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>12 January, 2025</small>
                                            {{-- <small><i class="bi bi-calendar-week-fill text-default me-2"></i>{{date("j F, Y", strtotime($row->event_date))}}</small> --}}
                                        </div><br>
                                        <h4 class="mb-3">ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশের জাতীয় নির্বাহী কমিটির সভা অনুষ্ঠিত হয়</h4>
                                        <p class="description_1">"ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশ" এর জাতীয় নির্বাহী কমিটির ২০২৪-২০২৫ অর্থ বছরের দ্বিতৃয় সভা গত ৪ঠা ফেব্রুয়ারী রাজধানীর একটি অভিজাত হোটেলে অনুষ্ঠিত হয়।</p>
                                        <a class="text-uppercase text-default" href="{{route('page.blogs_details')}}">Read More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                               <!--Item-->
                            <div class="col-md-6">
                                <div class="blog-item bg-light overflow-hidden">
                                    <div class="position-relative overflow-hidden" style="height: 200px">
                                        <a href="{{route('page.blog_details_two')}}">
                                            <img class="img-fluid" src="{{asset('public')}}/images/pages/news-2.jpg" alt="" width="100%">
                                            <!--<span class="position-absolute top-0 start-0 bg-default text-white mt-5 py-2 px-4">4 February, 2025</span>-->
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>23 February, 2025</small>
                                            {{-- <small><i class="bi bi-calendar-week-fill text-default me-2"></i>{{date("j F, Y", strtotime($row->event_date))}}</small> --}}
                                        </div><br>
                                        <h4 class="mb-3">শপথ গ্রহণ অনুষ্ঠান - ২০২৫-২০২৬ নির্বাহী কমিটি</h4>
                                        <p class="description_1">"ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশ" এর জাতীয় নির্বাহী কমিটির ২০২৪-২০২৫ অর্থ বছরের দ্বিতৃয় সভা গত ৪ঠা ফেব্রুয়ারী রাজধানীর একটি অভিজাত হোটেলে অনুষ্ঠিত হয়।</p>
                                        <a class="text-uppercase text-default" href="{{route('page.blog_details_two')}}">Read More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                                <!--Item-->
                            <div class="col-md-6">
                                <div class="blog-item bg-light overflow-hidden">
                                    <div class="position-relative overflow-hidden" style="height: 200px">
                                        <a href="{{route('page.blog_details_three')}}">
                                            <img class="img-fluid" src="{{asset('public')}}/images/pages/news-3.jpg" alt="" width="100%">
                                            <!--<span class="position-absolute top-0 start-0 bg-default text-white mt-5 py-2 px-4">4 February, 2025</span>-->
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>21 January, 2025</small> 
                                            {{-- <small><i class="bi bi-calendar-week-fill text-default me-2"></i>{{date("j F, Y", strtotime($row->event_date))}}</small> --}}
                                        </div><br>
                                        <h4 class="mb-3">ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশের জাতীয় নির্বাহী কমিটির প্রথম সভা অনুষ্ঠিত।</h4>
                                        <p class="description_1">""ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশ" এর প্রথম জাতীয় নির্বাহী কমিটির ২০২৪-২০২৫ অর্থ বছরের দ্বিতৃয় সভা গত ২১শে জানুয়ারী রাজধানীর একটি অভিজাত হোটেলে অনুষ্ঠিত হয়।</p>
                                        <a class="text-uppercase text-default" href="{{route('page.blog_details_three')}}">Read More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <!--<div class="mb-5">
                        <form action="{{ route('page.events-search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control p-3" placeholder="Keyword">
                                <button class="btn bg-default text-white px-4"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>-->
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    <!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
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
                    </div>-->
                    <!-- Category End -->
    
    
                    <!-- Image Start -->
                    <div class="mb-5 bg-light p-4">
                        <img src="{{asset('public/images')}}/logo.png" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
    
                    <!-- Tags Start -->
                   <!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
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