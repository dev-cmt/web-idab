
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 p-4" style="background-color: #021430;">
                        <a href="{{url('/')}}" class="navbar-brand">
                            <img src="{{asset('public/frontend')}}/images/Pune-Club-Logo.png" alt="" style="width:120px;">
                        </a>
                        <div class="mt-4">
                            <img src="{{asset('public/frontend')}}/images/icon-android.png" alt="" style="width:100px;">
                            {{-- <img src="{{asset('public/frontend')}}/images/icon-iso.png" alt="" style="width:100px;"> --}}
                        </div>
                        {{-- <p class="mt-3 mb-4">Pune Club was established in 2005 by a group of Ex-student of Pune University from Bangladesh.</p>
                        
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <a href="{{route('page.about')}}" class="btn btn-dark">Submit</a>
                            </div>
                        </form> --}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">Pune Club: Address</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><a class="text-light" href="mailto:<nowiki> info@puneclub.org">info@puneclub.org</a></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+880 17 1113 6108</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="https://twitter.com/PuneClubBD"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100091491756617"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.linkedin.com/in/pune-club-1037ab270/"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.instagram.com/pune_club_bd/"><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="https://www.youtube.com/@puneclubbd"><i class="fab fa-youtube fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="{{url('/')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="{{route('page.about')}}"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="{{route('page.gallery_image')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Gallery</a>
                                <a class="text-light mb-2" href="{{route('page.events')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Events</a>
                                <a class="text-light mb-2" href="{{route('page.contact')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="{{route('login')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Sign In</a>
                                <a class="text-light mb-2" href="{{route('register')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Register</a>
                                <a class="text-light mb-2" href="{{url('comming_soon')}}"><i class="bi bi-arrow-right text-primary me-2"></i>FAQ</a>
                                <a class="text-light mb-2" href="{{url('comming_soon')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Privacy Policy</a>
                                <a class="text-light mb-2" href="{{url('comming_soon')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Terms & Conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white bg_primary">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-sm-12">
                <div class="d-flex align-items-center justify-content-start" style="height: 65px;">
                    <p class="mb-0">&copy; 2023 <a class="text-white border-bottom" href="#">Pune club.</a> All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="d-flex align-items-center justify-content-end" style="height: 65px;">
                    <p class="mb-0">&copy; Developed by: <a class="mx-4" href="https://iconisl.com"><img src="{{asset('public/frontend')}}/images/icon.png" alt="Icon Information Systems Ltd." style="width:60px;"></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
