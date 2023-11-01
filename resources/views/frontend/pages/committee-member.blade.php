@extends('frontend.layouts.app')
@section('title', $committeesType->name)
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <!--<div class="section-title">
                <h2 class="reveal">If You Have Any Query, Feel Free To Contact Us</h2>
                <p>Et nemo qui impedit suscipit alias ea. Quia fugiat sitin iste officiis commodi quidem hic quas.</p>
            </div>-->
            <div class="row">
                @if ($committeesType->id == 1)
                 <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shafiul.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. Shafiul Islam </h5>
                        <h6 class="text-danger">Convener</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Syed.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. Syed Quamrul Ahsan</h4>
                        <h6 class="text-danger">Members Secretary</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shajib.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">Ar. Shajib Jahan</h4>
                        <h6 class="text-danger">Co-Convener</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Saron.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. Md Saiful Islam Saron</h4>
                        <h6 class="text-danger">Finance Director</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Mohammad Aminul Islam Sikder.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. Wasim Sikder</h4>
                        <h6 class="text-danger">Professional Member</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Sarker.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. MD Pial Sarker (pia)</h4>
                        <h6 class="text-danger">Professional Member</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Parvez.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                       <h5 class="mt-4">Ar. Ismaiel Parvez</h4>
                        <h6 class="text-danger">Professional Member</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shahiddullah.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">A. A. K. M. Shahidullah Chy</h4>
                        <h6 class="text-danger">Member</h6>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Roksana.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr. Roksana Hossen Mishu</h4>
                        <h6 class="text-danger">Professional Member</h6>
                    </div>
                </div>
                
                @elseif($committeesType->id == 2)
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shafiul.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Shafiul Islam</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                         <div>
                            <img src="{{asset('public/images')}}/member-pic/Syed.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Syed Quamrul Ahsan</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shajib.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">Ar Shajib Jahan</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Saron.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Md Saiful Islam Saran</h4>
                    </div>
                </div>
                  <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Parvez.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">Ar Ismaiel Parvez</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Mohammad Aminul Islam Sikder.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Wasim Sikder</h4>
                    </div>
                </div>
                   <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Rashed Mazhar.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Rashed Mazhar</h4>
                    </div>
                </div>
                   <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                         <div>
                            <img src="{{asset('public/images')}}/member-pic/Roksana.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Roksana Hossen Mishu</h4>
                    </div>
                </div>
                    <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Erfan Babu.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Erfan Babu</h4>
                    </div>
                </div>
                    <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Md Anamul Haque.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Md Anamul Haque</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IAr Shariful Islam.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IAr. Mohammad Shariful Islam</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Sarker.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr MD Pial Sarker (pia)</h4>
                    </div>
                </div>
            <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Md Rokibul hasan.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Md Rokibul Hasan</h4>
                    </div>
                </div>
                 <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Sumon Kumar.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Sumon Kumar</h4>
                    </div>
                </div>
                 <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Mohammad Ruhul Amin.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Mohammad Ruhul Amin</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/Shahiddullah.jpeg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">A. A. K. M. Shahidullah Chy</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Mohiuddin Sumon</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Md Masud Rana</h4>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="bg-white border text-center p-4">
                        <div>
                            <img src="{{asset('public/images')}}/member-pic/IDr Abdur Rahim.jpg" class="img-fluid" alt="" style="height: 100%">
                        </div>
                        <h5 class="mt-4">IDr Abdur Rahim</h4>
                    </div>
                </div>
               
               
                @endif
            </div>
            @if($committeesType->id == 0)
            <div class="row">
                @foreach ($data as $key=> $row )
                <div class="col-lg-3 mb-3"> 
                    <div class="hover_card_pages wow slideInUp" data-wow-delay="0.3s">
                        <div class="imgBx">
                            <img src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}" alt="images">
                        </div>
                        <div class="hover_card_details">
                            <h2>{{$row->name}}</h2>
                           @if ($row->infoCompany && ($row->infoCompany->company_name || $row->infoCompany->designation))
                                <h2><span>{{ $row->infoCompany->designation ?? '' }}</span></h2>
                                <h4><span>({{ $row->infoCompany->company_name ?? '' }})</span></h4>
                            @elseif ($row->infoStudent && ($row->infoStudent->student_institute || $row->infoStudent->semester))
                                <h2><span>{{ $row->infoStudent->student_institute ?? '' }}</span></h2>
                            @endif
                        </div>
                        {{-- <a href="{{route('page.member_details', $row->user_id)}}" class="member_dettails_btn btn btn-primary py-2 px-4 mt-4">Details</a> --}}
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </section><!-- End Contact Section -->

@endsection