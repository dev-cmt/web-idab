@extends('frontend.layouts.app')
@section('title', $committeesType)
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 class="reveal">If You Have Any Query, Feel Free To Contact Us</h2>
                <p>Et nemo qui impedit suscipit alias ea. Quia fugiat sitin iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
                @foreach ($data as $key=> $row )
                <div class="col-lg-3 mb-3">
                    <div class="hover_card_pages wow slideInUp" data-wow-delay="0.3s">
                        <div class="imgBx">
                            <img src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}" alt="images">
                        </div>
                        <div class="hover_card_details">
                            <h2>{{$row->name}}</h2>
                            @if ($row->infoCompany->company_name || $row->infoCompany->designation)
                                <h2><span>{{$row->infoCompany->designation}}</span></h2>
                                <h4><span>({{$row->infoCompany->company_name ?? ''}})</span></h4>
                            @elseif ($row->infoStudent->student_institute || $row->infoStudent->semester)
                                <h2><span>{{$row->infoStudent->student_institute}}</span></h2>
                            @endif
                        </div>
                        {{-- <a href="{{route('page.member_details', $row->user_id)}}" class="member_dettails_btn btn btn-primary py-2 px-4 mt-4">Details</a> --}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection