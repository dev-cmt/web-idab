@extends('frontend.layouts.app')
@section('title', 'Gallery Details')
@section('style')
    <!-- Gallery -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/lightgallery.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/lightgallery.min.css">
@endsection
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 class="reveal">{{$posts->title}}</h2>
                <p>{{$posts->description}}</p>
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
                                <h5 class="thumbnail-classic-title text-white">IDAB</h5>
                                <time class="thumbnail-classic-time" datetime="{{date("j F, Y", strtotime($img->created_at))}}">{{date("j F, Y", strtotime($img->created_at))}}</time>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <a href="@if ($posts->drive_url){{$posts->drive_url}}@else{{route('dashboard-gallery.all')}}@endif" class="button">More Pictures</a>
            </div>

        </div>
    </section><!-- End Contact Section -->
  
@endsection

@section('script')
<!-- Light Gallery -->
<script src="{{asset('public/frontend')}}/js/lightgallery.min.js"></script>
<script src="{{asset('public/frontend')}}/js/lightgallery.js"></script>
@endsection
