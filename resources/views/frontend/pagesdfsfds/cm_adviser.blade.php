@extends('frontend.layouts.app')
@section('content')
    <!-- Team Start -->
    <div class="container-fluid p-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
            <h1 class="mb-0">Adviser</h1>
        </div>
        <div class="row g-5">
            @foreach ($results as $key=> $row )
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}">
                    </div>
                    <div class="team-content">
                        <h3 class="name">{{$row->name}}</h3>
                        <h4 class="title">{{$row->designation}}</h4>
                        <h5 class="text-danger" style="font-size:12px">({{$row->company_name}})</h5>
                        <a href="{{route('page.member_details', $row->user_id)}}" class="btn btn-primary py-2 px-4 mt-4">Details</a>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="fab fa-facebook-f fw-normal" aria-hidden="true"></a></li>
                        <li><a href="#" class="fab fa-twitter fw-normal" aria-hidden="true"></a></li>
                        <li><a href="#" class="fab fa-instagram fw-normal" aria-hidden="true"></a></li>
                        <li><a href="#" class="fab fa-linkedin-in fw-normal" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Team End -->

@endsection