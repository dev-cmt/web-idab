@extends('frontend.layouts.app')
@section('title', 'Types of Membership')
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section class="faq section-bg">
        <div class="container">

            <div class="section-title">
                <!--<h2 class="reveal">Frequently Asked Questions</h2>-->
        
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
                        <i class="bi bi-card-text me-3"></i>Corporate Partner
                    </button>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-1.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h4 class="mb-4"><i class="bi bi-amd text-danger"></i>First 100 Member 50% Discount</h4>
                                    <h5 class="mb-4">Student Member</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>1.Studentship in Relative Subject</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2. Educational Certificate (SSC/HSC)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3. Copy of Student ID</p>
                                    <p class="mb-4">(Registration Fee 1000/-)</p>
                                    <a href="#" class="button">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-2.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Candidate Member</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.B.Arch</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2.OneYear Diploma in Related Subject</p>
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
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-3.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Professional Member</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.One Year Diloma/4 Year Experience</p></p></p>
                                    <p><i class="bi bi-check-lg me-3"></i>2. B. Arch/1 Year Experience</p></p>
                                    <p><i class="bi bi-check-lg me-3"></i>3.Int. Architecture/2 Years Experience</p>
                                    <p><i class="bi bi-check-lg me-3"></i>4.Passport Size Picture</p>
                                    <p><i class="bi bi-check-lg me-3"></i>5.Educational Certificate (SSC/HSC)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>6.Educational Certificate (ID, ARCH, IAR)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>7.Job Experience Certificate </p>
                                    <p><i class="bi bi-check-lg me-3"></i>8.Valid Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>9.Valid Tin Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>10.NID</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                    <a href="#" class="button">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-4.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Associate Member</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.Graduation in Any Subject</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2.Passport Size Picture</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3.Educational Certificate (SSC/HSC)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>4.Job Experience Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>5.Valid Tin Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>6.NID (They don't have voting rights.)</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                    <a href="#" class="button">Read More</a>
                                </div>
                            </div>
                        </div>
                            <div class="tab-pane fade" id="tab-pane-5">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-5.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Trade Member</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.Assiciated in Interior Business</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2.Passport Size Picture</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3.Valid Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>4.Valid Tin Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>5.NID (They don't have voting rights.)</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 10000/-)</p>
                                    <a href="#" class="button">Read More</a>
                                </div>
                            </div>
                        </div>
                            <div class="tab-pane fade" id="tab-pane-6">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-6.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Corporate Partner</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.Assiciated in Industrial Business</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2.Passport Size Picture</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3.Job Experience Certificate </p>
                                    <p><i class="bi bi-check-lg me-3"></i>4.Valid Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>5.Valid Tin Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>6.NID</p>
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


@endsection