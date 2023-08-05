@extends('frontend.layouts.app')
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 class="reveal">If You Have Any Query, Feel Free To Contact Us</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sitin iste officiis commodi quidem hic quas.</p>
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
                        <p><a href="tel:02222227174">02222227174</a>, <a href="tel:01725151515">01725151515</a></p>
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
            <div class="row g-5">
                <div class="col-lg-6 form">
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    <form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data"  class="php-email-form"> 
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth  placeholder="Your Name" style="height: 55px;">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email" style="height: 55px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}" placeholder="Subject" style="height: 55px;">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="4" placeholder="Message"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.741283477749!2d90.42170751402399!3d23.7922254930963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7bc808ffffd%3A0xd5bbd38592a60a66!2sIcon%20Information%20Systems%20Ltd.!5e0!3m2!1sen!2sbd!4v1677491782678!5m2!1sen!2sbd" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection