@extends('frontend.layouts.app')
@section('title', 'Blog Details')

<style>
    .recent-blog-item h1 {
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
            
            <!-- Blog Details Section -->
            <div class="col-lg-8">
                 <img class="img-fluid my-4" src="{{asset('public')}}/images/pages/news-01.jpg" alt="" width="100%">
                <article class="blog-post">
                    <h6 class="display-5 link-body-emphasis mb-1">ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশের জাতীয় নির্বাহী কমিটির সভা অনুষ্ঠিত হয়</h6>
                        <hr>
                    <p class="blog-post-meta">4 February, 2025 <a href="#">Mark</a></p>
            
                    <p>"ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশ" এর জাতীয় নির্বাহী কমিটির ২০২৪-২০২৫ অর্থ বছরের দ্বিতৃয় সভা গত ৪ঠা ফেব্রুয়ারী রাজধানীর একটি অভিজাত হোটেলে অনুষ্ঠিত হয়।</p>
                
                    <p>সভায় সংগঠনের সম্মানিত সভাপতি জনাব সৈয়দ কামরুল আহসান এর সভাপতিত্বে এবং সিনিয়র সহ-সভাপতি মো. সাইফুল ইসলাম সরন এর সঞ্চালনায় পরিচালিত হয়। সভায় উপস্থিত ছিলেন উপদেস্টা সফিউল ইসলাম,  সহ-সভাপতি আর্কিটেক্ট সজীব জাহান, পরিচালক ওয়াসিম সিকদার, আর্কিটেক্ট ইসমাইল পারভেজ, সুমন প্রামাণিক, মো. এনামুল হক, ইন্টেরিয়র আর্কিটেক্ট মুহাম্মদ শরীফুল ইসলাম, নিয়াজুর রহমান এবং আব্দুর রহিম, যাঁরা সংগঠনের ভবিষ্যৎ উন্নয়ন ও পরিকল্পনা নিয়ে মূল্যবান মতামত প্রদান করেন।</p>
                    <h2>উক্ত সভায় সর্ব সম্মতিক্রমে নিম্ন লিখিত সিদ্ধান্ত সমুহ গৃহীত হয়: </h2>
                    <p>১। শপথ গ্রহন অনুষ্ঠান বিশ্বসাহিত্য কেন্দ্রে ২৩ই ফ্রেব্রুয়ারী অনুষ্ঠিত হবে।<br> 
২। সভায় প্রধান অথিতি হিসেবে উপস্থিত থকবেন স্থপতি প্রফেসর ডঃ আবু সাঈদ এম আহমেদ।                       <br>
৩। ইসি কমিটির প্রয়োজনীয় কাগজপত্র ০৬ই ফেব্রুয়ারী মধ্যে সংশ্লিষ্ট অধিদপ্তরে জমা দেয়া হবে।<br>
৪। এওয়ার্ড প্রোগ্রাম ২৬ই এপ্রিল অনুষ্ঠিত হবে।<br>
</p>
                  </article>
            </div>
            
            <!-- Sidebar Start -->
            <div class="col-lg-4">
                
                <!-- Search Form Start -->
                <!--<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
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
                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                            <i class="bi bi-arrow-right me-2"></i> Web Design
                        </a>
                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                            <i class="bi bi-arrow-right me-2"></i> Web Development
                        </a>
                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                            <i class="bi bi-arrow-right me-2"></i> Keyword Research
                        </a>
                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                            <i class="bi bi-arrow-right me-2"></i> Email Marketing
                        </a>
                    </div>
                </div>-->
                <!-- Category End -->
    
                <!-- Image Start -->
                <div class="mb-5 bg-light p-4">
                    <img src="{{ asset('public/images/logo.png') }}" alt="Logo" class="img-fluid rounded">
                </div>
                <!-- Image End -->

            </div>
            <!-- Sidebar End -->

        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
