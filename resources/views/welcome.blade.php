@extends('frontend.layouts.app')
@section('content')
        <!-- ======= Content Section ======= -->
    <main id="main">
        <!-- ======= Feature Section ======= -->
        <section id="feature" class="feature">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-box animate__animated animate__slideInLeft">
                            <i class="bi bi-people-fill"></i>
                            <h4>The Society</h4>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon-box animate__animated animate__slideInLeft">
                            <i class="bi bi-person-badge"></i>
                            <h4>Be a Member</h4>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon-box animate__animated animate__slideInRight">
                            <i class="bi bi-award-fill"></i>
                            <h4>IDAB Awards</h4>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon-box animate__animated animate__slideInRight">
                            <i class="bi bi-wechat"></i>
                            <h4>Social</h4>
                        </div>
                    </div>
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section>
        <!-- End Feature -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row no-gutters">
                    <div class="image animate__animated animate__fadeInDown col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start">

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
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
  
        <!-- ======= Upcoming Events Section======= -->
        <section id="events" class="events section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">UPCOMING EVENTS</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div id="owl-upcoming-events" class="owl-carousel owl-theme">
                        <div><img src="http://placehold.it/1170x300/42bdc2/FFFFFF"></div>
                        <div><img src="http://placehold.it/1170x400/42bdc2/FFFFFF"></div>
                        <div><img src="http://placehold.it/1170x500/42bdc2/FFFFFF"></div>
                        <div><img src="http://placehold.it/1170x200/42bdc2/FFFFFF"></div>
                        <div><img src="http://placehold.it/1170x500/42bdc2/FFFFFF"></div>
                    </div>
                </div>

            </div>
        </section><!-- End Upcoming Events Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">How IDAB Benefit You</h2>
                    <p class="reveal">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Professional Guidance</a></h4>
                        <p class="description">VWe offer legal helplines, specialist guides, and peer-to-peer mentoring for our members.</p>
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
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-brightness-high"></i></div>
                        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum
                            soluta nobis est eligendi</p>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Why Be A Member?</h2>
                    <p>IDAB a complete association of people who are passionate about Interior Design in Bangladesh.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box">
                            <span>01</span>
                            <h4>Lorem Ipsum</h4>
                            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero
                                placeat</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box">
                            <span>02</span>
                            <h4>Repellat Nihil</h4>
                            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire
                                leno para
                                dest</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box">
                            <span>03</span>
                            <h4> Ad ad velit qui</h4>
                            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam
                                quis</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->
        
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Happy Clients</strong> consequuntur quae</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Projects</strong> adipisci atque cum quia aut</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Frequently Asked Questions</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 nav nav-pills" style="height: 380px;overflow: hidden;">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <i class="bi bi-card-text me-3"></i>Student member
                        </button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <i class="bi bi-card-text me-3"></i>Candidate member
                        </button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <i class="bi bi-card-text me-3"></i>Professional member
                        </button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <i class="bi bi-card-text me-3"></i>Associate member
                        </button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <i class="bi bi-card-text me-3"></i>Trade member
                        </button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-6" type="button">
                            <i class="bi bi-card-text me-3"></i>Corporate member
                        </button>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-1.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4"><i class="bi bi-amd text-danger"></i> First 100 Member 50% Discount</h4>
                                        <h5 class="mb-4">Student Member</h5>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Student Member</p>
                                        <p><i class="bi bi-check-lg me-3"></i>2. Educational Certificate (SSC/HSC)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>3. Educational Certificate (ID, ARCH, IAR)</p>
                                        <p class="mb-4">(Registration Fee 1000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-2.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">Candidate Member</h3>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>
                                        <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>3.Educational Certificate (ID, ARCH, IAR)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>4.Valid Trade License</p>
                                        <p><i class="bi bi-check-lg me-3"></i>5.Valid TIN Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>6. NID</p>
                                        <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-3.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">Professional Member</h3>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>
                                        <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>3.Educational Certificate (ID, ARCH, IAR)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>4.Job Experience Certificate </p>
                                        <p><i class="bi bi-check-lg me-3"></i>5.Valid Trade License</p>
                                        <p><i class="bi bi-check-lg me-3"></i>6.Valid Tin Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>7.NID</p>
                                        <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-4">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-4.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">Associate Member</h3>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>
                                        <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>
                                        <p><i class="bi bi-check-lg me-3"></i>3.Job Experience Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>5.Valid Tin Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>6.NID (They don't have voting rights.)</p>
                                        <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="tab-pane-5">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-5.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">Trade Member</h3>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>
                                        <p><i class="bi bi-check-lg me-3"></i>2.Valid Trade License</p>
                                        <p><i class="bi bi-check-lg me-3"></i>3.Valid Tin Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>4.NID (They don't have voting rights.)</p>
                                        <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 10000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="tab-pane-6">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-6.jpg" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">Corporate Member</h3>
                                        <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>
                                        <p><i class="bi bi-check-lg me-3"></i>4.Job Experience Certificate </p>
                                        <p><i class="bi bi-check-lg me-3"></i>5.Valid Trade License</p>
                                        <p><i class="bi bi-check-lg me-3"></i>6.Valid Tin Certificate</p>
                                        <p><i class="bi bi-check-lg me-3"></i>7.NID</p>
                                        <p class="mb-4">(Registration Fee 000/-) (Annual Fee 0000/-)</p>
                                        <a href="#" class="button">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Ad Hoc Committee</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div id="owl-team-member" class="owl-carousel">
                    <div class="member">
                        <img src="{{asset('public/frontend')}}/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
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
                    <div class="member">
                        <img src="{{asset('public/frontend')}}/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member">
                        <img src="{{asset('public/frontend')}}/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member" data-wow-delay="0.1s">
                        <img src="{{asset('public/frontend')}}/img/team/team-4.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member">
                        <img src="{{asset('public/frontend')}}/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div id="owl-clients" class="owl-carousel">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/frontend')}}/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                  </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Contact</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
                        in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row contact-info">
                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <address>A108 Adam Street, NY 535022, USA</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
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
