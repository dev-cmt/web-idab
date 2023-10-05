@extends('frontend.layouts.app')

@section('style')
<style>
    .new-arrival-product .new-arrivals-img-contnent {
        overflow: hidden;
    }
    .new-arrival-product:hover .new-arrivals-img-contnent img {
        transform: scale(1.5) translateY(12%);
        -moz-transform: scale(1.5) translateY(12%);
        -webkit-transform: scale(1.5) translateY(12%);
        -ms-transform: scale(1.5) translateY(12%);
        -o-transform: scale(1.5) translateY(12%);
    }
    .new-arrival-product .new-arrivals-img-contnent img {
        width: 100%;
        -webkit-transition: all 0.5s;
        -ms-transition: all 0.5s;
        transition: all 0.5s;
    }
</style>
@endsection
@section('content')
<!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">IDAB</h5>
                <h1 class="mb-0">Gallery</h1>
            </div>
            <div class="row g-5">
                @foreach ($posts as $key=> $row )
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <a href="{{route('page.gallery-show', $row ->id)}}"><img class="img-fluid" src="{{asset('public/images')}}/gallery/{{ $row->cover }}" alt=""></a>
                                </div>
                                <div class="new-arrival-content mt-2">
                                    <h4>Picture</h4>
                                    <p class="text-uppercase description_2 mb-2"></p>
                                    <div class="d-flex justify-content-between">
                                        <label class="text-primary">Event Date:</label><span>{{date("j F, Y", strtotime($row->date))}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label class="text-primary">Published Date:</label><span>{{date("j F, Y", strtotime($row->created_at))}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label class="text-primary">Publisher Name:</label><span>{{$row->user->name}}</span>
                                    </div>
                                    @if ($row->description)
                                        <hr>
                                    @endif
                                    <p class="text-uppercase description_2 m-0">{{$row->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection