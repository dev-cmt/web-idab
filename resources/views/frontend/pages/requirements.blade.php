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
                <div class="col-lg-3 nav nav-pills" style="height: 380px;width: 254px;overflow: hidden;">
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
                                <div class="col-md-8">
                                    <h4 class="mb-4"><i class="bi bi-amd text-danger"></i> First 100 Member 50% Discount</h4>
                                    <h5 class="mb-4">Student Member</h5>
                                    <h5 class="mb-4">Eligibility for Student membership</h5>
                                    <p>•	Must be Student of Bachelor of Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute.</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Student ID copy (both side)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Relevant head of department’s acknowledgment letter.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID copy</p></p>
                                    <p class="mb-4">(Registration Fee 1000/-)</p>
                                     <a href="{{route('page.requirements_student')}}" class="btn btn-info btn-sm">Read More</a>
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
                                <div class="col-md-8">
                                    <h3 class="mb-4">Candidate Member</h3>
                                     <h5 class="mb-4">Eligibility for Candidate membership</h5>
                                    <p>•	Must be an Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute.</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Architect, Interior design, Diploma architect)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Trade license/ Job Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                     <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                     <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
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
                                <div class="col-md-8">
                                    <h3 class="mb-4">Professional Member</h3>
                                       <h5 class="mb-4">Eligibility for Professional membership</h5>
                                    <p>•	Must be an Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute with 5 years’ experience</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Architect, Interior design, Diploma architect)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Trade license/ Job Certificate with 5 years’ experience.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                     <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
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
                                <div class="col-md-8">
                                    <h3 class="mb-4">Associate Member</h3>
                                    <h5 class="mb-4">Eligibility for Associate membership</h5>
                                    <p>•	Must be graduation from any reputed university</p>
                                    <p>•	Doing Interior design Business last 5 years</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Any Discipline)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated Trade License as Interior design Company</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>
                                     <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
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
                                <div class="col-md-8">
                                    <h3 class="mb-4">Trade Member</h3>
                                    <h5 class="mb-4">Eligibility for Trade membership</h5>
                                    <p>•	Must be graduation from any reputed university</p>
                                    <p>•	Must do business as Importer, shop owner, trader on Interior design materials</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Any Discipline)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 10000/-)</p>
                                     <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
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