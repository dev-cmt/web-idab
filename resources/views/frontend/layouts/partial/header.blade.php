    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block bg_primary">
        <div class="row gx-0">
            <div class="col-lg-10 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><a class="text-light" href="https://www.google.com/maps/dir//Icon+Information+Systems+Ltd.+Tower+2+Suite+%23+12%2FD,+Confidence+Centre+Dhaka+1212/@23.7922206,90.4238962,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3755c7bc808ffffd:0xd5bbd38592a60a66!2m2!1d90.4238962!2d23.7922206">12/D, Confidence Center, Gulshan</a></small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+880 17 1113 6108</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i><a class="text-light" href="mailto:<nowiki> info@puneclub.org">info@puneclub.org</a></small>
                </div>
            </div>
            <div class="col-lg-2 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100091491756617"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/PuneClubBD"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/in/pune-club-1037ab270/"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/pune_club_bd/"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.youtube.com/@puneclubbd"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{route('/')}}" class="navbar-brand p-0">
                <img data-wow-delay="0.9s" src="{{asset('public/frontend/images')}}/pune_logo.png" style="max-width: 192px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{url('/')}}" class="nav-item nav-link {{ (Route::current()->uri() == '/') ? 'active' : '' }}">Home</a>
                    <a href="{{route('page.about')}}" class="nav-item nav-link {{ (Route::currentRouteName() == 'page.about') ? 'active' : '' }}">About</a>
                    <a href="{{route('page.events')}}"  class="nav-item nav-link {{ (Route::currentRouteName() == 'page.events') ? 'active' : '' }}">Event</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Committee</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('fv.advisor')}}" class="dropdown-item">Adviser</a>
							 <a href="{{route('fv.executive_committee')}}" class="dropdown-item">Executive Committee</a>
							<a href="{{route('fv.welfare')}}" class="dropdown-item">Pune Welfare Trust</a>
                        </div>
                    </div>
                    <a href="{{route('page.member_list')}}"  class="nav-item nav-link {{ (Route::currentRouteName() == 'page.member_list') ? 'active' : '' }}">Member</a>
					<div class="nav-item dropdown">
					    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Gallery</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('page.gallery_image')}}" class="dropdown-item">Photo Gallery</a>
                            <a href="{{route('page.gallery_video')}}" class="dropdown-item">Video Gallery</a>
                           
                        </div>
                    </div>
                    <a href="{{route('page.contact')}}" class="nav-item nav-link {{ (Route::currentRouteName() == 'page.contact') ? 'active' : '' }}">Contact</a>
                </div>
                <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 ms-3">Become A Member</a>
                @endguest
                @auth
                <div class="btn-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->status)
                                <li><a href="{{ Route('profile_show', auth()->user()->id )}}" class="dropdown-item" type="button">Profile</a></li>
                            @endif
                            @if (Auth::user()->is_admin=="0" && Auth::user()->status=="0")
                                <li><a href="{{ Route('member_register.create') }}" class="dropdown-item" type="button">Fill Up Information</a></li>
                            @endif
                            @if (Auth::user()->is_admin=="1" && Auth::user()->status=="0")
                                <li><a href="{{ Route('member.not_approved') }}" class="dropdown-item" type="button">Waiting Approval</a></li>
                            @endif
                            
                            <form method="POST" action="{{ Route('logout') }}">
                                @csrf
                                <li><a href="{{ Route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item" type="button">Logout</a></li>
                            </form>
                        </ul>
                    </div>
                @endauth

                
            </div>
        </nav>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->