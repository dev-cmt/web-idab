    <!-- Header Banner Start -->
    <div class="container-fluid position-relative p-0">
        <div class="container-fluid bg-primary py-5" style="background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)),url({{asset('public/frontend')}}/images/carousel-1.jpg) center center no-repeat;background-size: cover;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    @if (Route::currentRouteName() == 'page.about')
                        <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    @elseif (Route::currentRouteName() == 'page.contact')
                        <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                    @elseif (Route::currentRouteName() == 'page.member_list')
                        <h1 class="display-4 text-white animated zoomIn">Member List</h1>
                    @elseif (Route::currentRouteName() == 'page.member_details')
                        <h1 class="display-4 text-white animated zoomIn">Member Details</h1>
                    @elseif (Route::currentRouteName() == 'page.member_lose')
                        <h1 class="display-4 text-white animated zoomIn">Lose Member</h1>
                    @elseif (Route::currentRouteName() == 'page.gallery_image')
                        <h1 class="display-4 text-white animated zoomIn">Image Gallery</h1>
                    @elseif (Route::currentRouteName() == 'page.gallery_video')
                        <h1 class="display-4 text-white animated zoomIn">Video Gallery</h1>
                    @elseif (Route::currentRouteName() == 'page.events')
                        <h1 class="display-4 text-white animated zoomIn">Events</h1>
                    @elseif (Route::currentRouteName() == 'page.events_details')
                        <h1 class="display-4 text-white animated zoomIn">Events Details</h1>
                    @elseif (Route::currentRouteName() == 'member_register.create')
                        <h1 class="display-4 text-white animated zoomIn">Member Information</h1>
                    @elseif (Route::currentRouteName() == 'fv.advisor')
                        <h1 class="display-4 text-white animated zoomIn">Advisor</h1>
                    @elseif (Route::currentRouteName() == 'fv.executive_committee')
                        <h1 class="display-4 text-white animated zoomIn">Executive Committee</h1>
                    @elseif (Route::currentRouteName() == 'fv.welfare')
                        <h1 class="display-4 text-white animated zoomIn">Welfare</h1>
                    @elseif (Route::currentRouteName() == 'events_register')
                        <h1 class="display-4 text-white animated zoomIn">Events Register</h1>
                    @endif

                    <a href="{{route('/')}}" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{route('page.about')}}" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header bannder End -->
