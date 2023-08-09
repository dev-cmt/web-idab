    <!-- Header Banner Start -->
    <div class="container-fluid position-relative p-0">
        <div class="container-fluid bg-primary py-5" style="background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)),url({{asset('public/images')}}/pages/banner.jpg) center center no-repeat;background-size: cover;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">@yield('title')</h1>

                    <a href="{{route('/')}}" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{route('page.about')}}" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header bannder End -->
