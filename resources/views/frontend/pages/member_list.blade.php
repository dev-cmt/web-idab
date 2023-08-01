@extends('frontend.layouts.app')
@section('content')


<style>
body{
    background: #f0f0f0;
    font-family: sans-serif;
}
</style>
       <!-- Team Start -->
       <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
                <h1 class="mb-0">Member List</h1>
            </div>
            <div class="row g-5">
                @foreach ($results as $key=> $row )
                <div class="col-lg-3 mb-3">
                    <div class="hover_card_pages wow slideInUp" data-wow-delay="0.3s">
                        <div class="imgBx">
                            <img src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}" alt="images">
                        </div>
                        <div class="hover_card_details">
                            <h2>{{$row->name}}<br><span>{{$row->designation}}</span></h2>
                            <h4><span>({{$row->company_name}})</span></h4>
                        </div>
                        <a href="{{route('page.member_details', $row->user_id)}}" class="member_dettails_btn btn btn-primary py-2 px-4 mt-4">Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection