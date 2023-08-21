@extends('frontend.layouts.app')
@section('title', 'Gallery Details')
@section('style')
    <!-- Gallery -->
    <link rel="stylesheet" href="{{asset('public/libs')}}/css/customs_gallery.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/vendor/lightgallery/css/lightgallery.min.css">
@endsection
@section('content')
 
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <section class="section" data-lightgallery="group">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pune Club Gallery</h5>
                <h1 class="mb-0">{{$posts->title}}</h1>
            </div>
            <div class="row">
                @if (count($posts->images)>0)
                    @foreach ($posts->images as $img)
                    <div class="col-lg-3 col-sm-6 mb-4 wow zoomIn" data-wow-delay="0.3s">
                        <div class="thumbnail-classic">
                            <a class="thumbnail-classic-figure" data-lightgallery="item" href="{{asset('public/images/gallery')}}/img/{{ $img->image}}">
                                <img src="{{asset('public/images/gallery')}}/img/{{ $img->image}}" alt="" width="480"/>
                            </a>
                            <div class="thumbnail-classic-caption">
                                <h5 class="thumbnail-classic-title text-white">Pune Club</h5>
                                <time class="thumbnail-classic-time" datetime="{{date("j F, Y", strtotime($img->created_at))}}">{{date("j F, Y", strtotime($img->created_at))}}</time>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <a href="@if ($posts->drive_url){{$posts->drive_url}}@else{{route('layouts.gallery_image')}}@endif" class="btn btn-primary py-md-3 px-md-5">More Pictures</a>
            </div>
        </section>
    </div>
  
@endsection

@section('script')
<!-- Light Gallery -->
<script src="{{asset('public/libs')}}/js/core.min.js"></script>
<script src="{{asset('public/libs')}}/js/script.js"></script>
@endsection
