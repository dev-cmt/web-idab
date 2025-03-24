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
                 <img class="img-fluid my-4" src="{{asset('public')}}/images/pages/news-2.jpg" alt="" width="100%">
                <article class="blog-post">
                    <h6 class="display-5 link-body-emphasis mb-1">শপথ গ্রহণ অনুষ্ঠান - ২০২৫-২০২৬ নির্বাহী কমিটি</h6>
                        <hr>
                    <p class="blog-post-meta">23 February, 2025 <a href="#">Mark</a></p>
            
                  <p>আইড্যাবের প্রথম নির্বাহী কমিটির অভিষেক অনুষ্ঠান ও শপথ গ্রহণ অনুষ্ঠিত ।</p>
                  
                  <p>বাংলাদেশে প্রথমবারের মতো স্থপতি, ইন্টেরিয়র ডিজাইনার, ইন্টেরিয়র আর্কিটেক্ট এবং অন্যান্য সমসাময়িক পেশাজীবীদের নিয়ে প্রতিষ্ঠিত হয়েছে "ইন্টেরিয়র ডিজাইনার্স এসোসিয়েশন অব বাংলাদেশ" (আইড্যাব)। গতকাল রোববার এর প্রথম নির্বাহী কমিটির অভিষেক অনুষ্ঠান অনুষ্ঠিত হয়েছে।</p>
                  
                  
                  <p>রাজধানীর বাংলা মোটরের বিশ্ব সাহিত্য কেন্দ্রে আয়োজিত এই অনুষ্ঠানে শপথ পাঠ করেন কমিটির ১১ জন নির্বাচিত সদস্য। এতে প্রধান অতিথি হিসেবে উপস্থিত থেকে শপথ পাঠ করান বাংলাদেশ স্থপতি ইনিস্টিউটের প্রেসিডেন্ট ড. আবু সাঈদ এম আহমদ।</p>
                  
                  
                  <p>এছাড়া বিশেষ অতিথি হিসেবে উপস্থিত ছিলেন, শান্ত মারিয়াম ইউনিভার্সিটি অব ক্রিয়েটিভ টেকনোলজির সহযোগী অধ্যাপক স্থপতি  এ.এফ.এম মহিউদ্দিন আখন্দ, স্থপতি তানিয়া করিম, মোহাম্মদ নাসিম, সহকারী চীফ ইঞ্জিনিয়ার , গণপূর্ত অধিদপ্তর (PWD), প্রতিষ্ঠাতা আহবায়ক শফিউল ইসলাম।</p>
                  
                  
                  <p>এর আগে গত ১২ জানুয়ারি মিরপুর ক্রিস্টাল ক্যাসেল কনভেনশান হলে অনুস্টিত প্রথম সভায় প্রথম কার্যকরী কমিটি তৈরি করা হয়। এতে সভাপতি হিসেবে নির্বাচিত হয়েছেন, সৈয়দ কামরুল আহসান, প্রথম ভাইস প্রেসিডেন্ট সাইফুল ইসলাম শরন; ভাইস প্রেসিডেন্ট স্থপতি সজীব জাহান। এবং ডিরেক্টর হিসেবে নির্বাচিত হয়েছে যথাক্রমে ওয়াসিম সিকদার, স্থপতি ইসমাইল পারভেজ, সুমন প্রামানিক, মোঃএনামুল হক,  ইন্টেরিয়র আর্কিটেক্ট মুহাম্মদ শরীফুল ইসলাম, ইরফান বাবু, ইন্টেরিয়র আর্কিটেক্ট নিয়াজুর রহমান এবং মো: আবদুর রহিম। </p>
                  
                 
                 <p>আইড্যাবের বিদায়ী আহবায়ক জনাব শফিউল ইসলাম বলেন, সবার অক্লান্ত পরিশ্রমে আজকের এই এসোসিয়েশন। এই এসোসিয়েশন এর কাছে বাংলাদেশের সমস্ত ইন্টেরিয়র ডিজাইনারদের অনেক দাবী যা এই ইসি কমিটি পুরন করবেন।</p>
                 
                 <p>অনুষ্ঠানে নতুন কমিটির সদস্যদের শপথ গ্রহণের পাশাপাশি আইড্যাবের ভবিষ্যৎ কার্যক্রম, শিল্পের উন্নয়ন ও ডিজাইনারদের ভূমিকা নিয়ে গুরুত্বপূর্ণ আলোচনা হয়।</p>
                 
                  
                  <p>সংগঠনের নবগঠিত নির্বাহী কমিটি ভবিষ্যতে দেশের ইন্টেরিয়র ডিজাইন শিল্পের বিকাশে আরও কার্যকর ভূমিকা রাখবে বলে প্রত্যাশা করা হচ্ছে।</p>
                  
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
