@extends('frontend.layouts.app')
@section('content')
<!-- Team Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Pune Club</h5>
            <h1 class="mb-0">Member Details</h1>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{asset('public')}}/images/profile/{{$user->profile_photo_path}}" style="width:15%" alt="">
        </div>
        <section class="container my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">{{$user->name}}</h1>
                <p>Batch Year: {{$user->batch}}</p>
                <p class="lead fw-normal text-muted mb-0">Registered Since </p>
            </div>
            <div class="row gx-5">
                <div class="col-xl-12">
                    <div class="accordion mb-5" id="accordionExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Personal Details</button></h3>
                            <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email ID</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Number</th>
                                            <td>{{$user->contact_number}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$infoPersonal->address}}, {{$infoPersonal->city}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FAQ Accordion 2-->
                    
                    <div class="accordion mb-5 mb-xl-0" id="accordionExample2">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Professional Details</button></h3>
                            <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>College Name</th>
                                            <td>{{$infoAcademic->collage}}</td>
                                        </tr>
                                        <tr>
                                            <th>Batch</th>
                                            <td>{{$user->batch}}</td>
                                        </tr>
                                        <tr>
                                            <th>Company</th>
                                            <td>{{$infoOther->company_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Description (if Any)</th>
                                            <td>{{$infoOther->designation}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-4">
                    <div class="card border-0 bg-light mt-xl-5">
                        <div class="card-body p-4 py-lg-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <div class="h6 fw-bolder">Have more questions?</div>
                                    <p class="text-muted mb-4">
                                        Contact me at
                                        <br />
                                        <a href="#!"></a>
                                    </p>
                                    <h5>OR</h5>
                                    <form method="post">
                                        <p>  <input type="text" name="fname" placeholder="Enter your fullname" class="form-control" required></p>
                                        <p><input type="email" name="emailid" placeholder="Enter your emaild" class="form-control" required></p>
                                        <p><input type="text" name="mobileno" placeholder="Enter your mobile no" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required></p>
                                        <p><textarea class="form-control" name="query" placeholder="Query / Message" required></textarea>
                                        </p>
                                        <input type="submit" class="btn btn-primary" name="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
   
    </main>
    
    </div>
</div>
<!-- Team End -->

@endsection