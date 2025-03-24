@extends('frontend.layouts.app')
@section('title', 'News')

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
                 <img class="img-fluid my-4" src="{{asset('public')}}/images/pages/news-3.jpg" alt="" width="100%">
                <article class="blog-post">
                    <h6 class="display-5 link-body-emphasis mb-1">ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশের জাতীয় নির্বাহী কমিটির প্রথম সভা অনুষ্ঠিত।</h6>
                        <hr>
                    <p class="blog-post-meta">21 January, 2025 <a href="#">Mark</a></p>
            
                 <p>"ইন্টেরিয়র ডিজাইনারস অ্যাসোসিয়েশন অব বাংলাদেশ" এর প্রথম জাতীয় নির্বাহী কমিটির ২০২৪-২০২৫ অর্থ বছরের দ্বিতৃয় সভা গত ২১শে জানুয়ারী রাজধানীর একটি অভিজাত হোটেলে অনুষ্ঠিত হয়।</p>
                  
                 <p>সভায় সংগঠনের সভাপতি জনাব সৈয়দ কামরুল আহসানের সভাপতিত্বে এবং সিনিয়র সহ-সভাপতি মো. সাইফুল ইসলাম সরন এর সঞ্চালনায় পরিচালিত হয়। সভায় উপস্থিত ছিলেন উপদেস্টা সফিউল ইসলাম, সহ-সভাপতি আর্কিটেক্ট সজীব জাহান, পরিচালক ওয়াসিম সিকদার, আর্কিটেক্ট ইসমাইল পারভেজ, সুমন প্রামাণিক, মো. এনামুল হক, ইন্টেরিয়র আর্কিটেক্ট মুহাম্মদ শরীফুল ইসলাম, নিয়াজুর রহমান এবং আব্দুর রহিম, যাঁরা সংগঠনের ভবিষ্যৎ উন্নয়ন ও পরিকল্পনা নিয়ে মূল্যবান মতামত প্রদান করেন।</p>
                 
                 <p>উক্ত সভায় সর্ব সম্মতিক্রমে নিম্ন লিখিত সিদ্ধান্ত সমুহ গৃহীত হয়:সংগঠনের কাঠামো ও কার্যক্রমকে আরও সুসংগঠিত ও গতিশীল করার উদ্যোগ।</p>
                 
                 <p>সদস্যদের দক্ষতা উন্নয়নে প্রশিক্ষণ ও কর্মশালার আয়োজন।</p> 
                  
                 <p>ইন্টেরিয়র ডিজাইন খাতে নতুন প্রযুক্তির সংযোজন ও গবেষণা কার্যক্রম পরিচালনা।</p>
                 
                 <p>নীতি-নির্ধারক মহলের সঙ্গে সমন্বয় সাধন করে শিল্পখাতের উন্নয়নে কার্যকর পদক্ষেপ গ্রহণ।</p>
                 
                 <p>দেশব্যাপী সদস্য বৃদ্ধির লক্ষ্যে প্রচার ও জনসচেতনতা কার্যক্রম পরিচালনা।</p>
                 
                 <p>সভায় সর্বসম্মতিক্রমে সিদ্ধান্ত গৃহীত হয় যে, সংগঠনের সামগ্রিক উন্নয়নের লক্ষ্যে নির্ধারিত কর্মপরিকল্পনা যথাযথভাবে বাস্তবায়নে সকলে একযোগে কাজ করবেন।</p>
                
                 <p>উপস্থিত নেতৃবৃন্দ সংগঠনের অগ্রগতির জন্য তাদের প্রতিশ্রুতি ব্যক্ত করেন এবং একটি গতিশীল ও আধুনিক সংগঠন হিসেবে আইড্যাবকে প্রতিষ্ঠিত করতে একসঙ্গে কাজ করার আহ্বান জানান।</p>
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
