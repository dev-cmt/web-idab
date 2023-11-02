@extends('frontend.layouts.app')
@section('content')
    <!-- ======= Content Section ======= -->
    <main id="main">
        <!-- ======= Feature Section ======= -->
        <section id="feature" class="feature">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <!--<div class="col-3">-->
                    <!--    <div class="icon-box animate__animated animate__slideInLeft">-->
                    <!--        <i class="bi bi-people-fill"></i>-->
                    <!--        <h4>The Association</h4>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <a href="https://idab.com.bd/pages/why-be-member" class="col-md-3 mx-2 text-center">
                        <div class="icon-box animate__animated animate__slideInLeft">
                            <!--<i class="bi bi-person-badge"></i>-->
                            <h4>Why be a Member</h4>
                        </div>
                    </a>
                    <a href="https://idab.com.bd/pages/requirements" class="col-md-3 mx-2 text-center">
                        <div class="icon-box animate__animated animate__slideInRight">
                            <!--<i class="bi bi-award-fill"></i>-->
                            <h4>Types of Membership</h4>
                        </div>
                    </a>
                    <!--<div class="col-3">-->
                    <!--    <div class="icon-box animate__animated animate__slideInRight">-->
                    <!--        <i class="bi bi-wechat"></i>-->
                    <!--        <h4>Social</h4>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section>
        <!-- End Feature -->

        <!-- ======= About Section ======= -->
         <!--<section id="about" class="about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="image animate__animated animate__fadeInDown col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background: url({{asset('public/images')}}/pages/about.jpg) center center no-repeat;">

                    </div>
                    <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                        <div class="content d-flex flex-column justify-content-center">
                            <h3>Interior Designer’s Association Of Bangladesh (IDAB)</h3>
                            <p>IDAB (Interior designer’s Association Of Bangladesh) founded in 2019 with some young and energetic Bangladeshi Interior Designers to represent the Interior designers & interior design industry as a whole of Bangladesh.</p>
                            <div class="row">
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-receipt"></i>
                                    <h4 class="">Corporis voluptates sit</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Ullamco laboris nisi</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-images"></i>
                                    <h4>Labore consequatur</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-shield"></i>
                                    <h4>Beatae veritatis</h4>
                                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>--><!-- 75End .content--><!-- End About Section -->
        
        @if (count($event) > 0)
        <!-- ======= Upcoming Events Section======= -->
        <section id="events" class="events animate__fadeInUp">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">UPCOMING EVENTS</h2>
                </div>

                <div class="row">
                    <div id="owl-upcoming-events" class="owl-carousel owl-theme">
                        @foreach ($event as $item)
                            <div><img src="{{asset('public/images')}}/events/{{ $item->image }}"></div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End Upcoming Events Section -->
        @endif

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services animate__fadeInUp">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">How IDAB Benefit You</h2>
                    <!--<p class="reveal">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>-->
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Professional Guidance</a></h4>
                        <p class="description">We offer legal helplines, specialist guides, and peer-to-peer mentoring for our members.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Institute Status</a></h4>
                        <p class="description">The use of our member logo is a symbol of credibility, authority, and professionalism</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">Continuous Development Support</a></h4>
                        <p class="description">Our members have access to a program of ongoing education and development related to interior design.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Speaking Opportunities</a></h4>
                        <p class="description">We frequently place our members as speakers at high-profile industry events and as experts in interior design articles.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        <h4 class="title"><a href="">Networking Events</a></h4>
                        <p class="description">Our busy events calendar provides members with regular opportunities to network with fellow industry professionals</p>
                    </div>
                    <!--<div class="col-lg-4 col-md-6 icon-box">-->
                    <!--    <div class="icon"><i class="bi bi-brightness-high"></i></div>-->
                    <!--    <h4 class="title"><a href="">Eiusmod Tempor</a></h4>-->
                    <!--    <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero-->
                    <!--        tempore, cumsoluta nobis est eligendi</p>-->
                    <!--</div>-->
                </div>

            </div>
        </section><!-- End Services Section --> --}}

        <!-- ======= Why Us Section ======= -->
       <!-- End Why Us Section -->
        
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($user)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Our Member</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($event)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Events</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($contact)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Community Support</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($executive)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Executive Members</strong></p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Team Section ======= 
        @if (count($add_hoc) > 0)
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Ad Hoc Committee</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div id="owl-team-member" class="owl-carousel">
                    @foreach ($add_hoc as $item)
                    <div class="member" style="height:260px">
                        <img src="{{asset('public/images')}}/profile/{{$item->profile_photo_path}}" class="img-fluid" alt="" style="height: 100%">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{$item->name}}</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        @endif--><!-- End Team Section -->

         <!--======= Clients Section ======= -->
        <section id="clients" class="clients mt-5 animate__fadeInUp">
            <div class="container">
                 <div class="section-title">
                    <h2 class="reveal">Corporate Partners</h2>
                </div>

                <div id="owl-clients" class="owl-carousel">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-1.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-2.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-3.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-4.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-5.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                  </div>

            </div>
        </section><!-- End Clients Section 

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact animate__fadeInUp">
            <div class="container">
                <div class="section-title">
                    <h2 class="reveal">Contact</h2>
                </div>
                <div class="row contact-info">
                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <address> Rain Razzak Plaza,2 Shahid Tazuddin Soroni, Moghbazar, Dhaka-1217, Bangladesh</address>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:01725151515">01725151515</a></p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:contact.idab@gmail.com">contact.idab@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form">
                    <form action="{{route('contact-us.store')}}" method="post" enctype="multipart/form-data" class="php-email-form"> 
                        @csrf                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth  placeholder="Your Name" style="height: 55px;">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email" style="height: 55px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}" placeholder="Subject" style="height: 55px;">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="4" placeholder="Message"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message was sent successfully.',
            })
        </script>
    @endif
@endsection
