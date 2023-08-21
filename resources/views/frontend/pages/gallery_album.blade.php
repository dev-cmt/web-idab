@extends('frontend.layouts.app')
@section('title', 'Gallery')
@section('content')
<!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
                <h1 class="mb-0">Gallery</h1>
            </div>
            <div class="row g-5">
                @foreach ($posts as $key=> $row )
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <a href="{{route('page.gallery-show', $row ->id)}}">
                            <div class="text-center p-2">
                                <h4 class="text-primary pt-3">{{$row->title}}</h4>
                            </div>
                            <div class="team-img position-relative overflow-hidden" style="width:100%; height: 250px">
                                <img class="img-fluid w-100" src="{{asset('public/images')}}/gallery/{{ $row->cover }}" alt="">
                            </div>
                            <div class="row p-4">
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
                                <div class="col-lg-5">
                                    <h6 class="text-primary"><i class="far fa-user text-primary me-2"></i> Publisher</h6>
                                </div>
                                <div class="col-lg-7">
                                    <h6 class="text-dark">: {{$row->user->name}}</h6>
                                </div>
                                <p class="text-uppercase description_2 m-0">{{$row->description}}</p>
                                <!--<a href="{{$row->drive_url}}" class="text-white btn btn-primary my-2">Download</a>-->
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection